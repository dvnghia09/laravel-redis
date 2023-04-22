<template>
  <div class="row justify-content-center h-100">
    <div class="col-md-8 chat">
      <SharedRoom
        :messages="messages"
        :currentRoom="currentRoom"
        :saveMessage="saveMessage"
        @sendRef="getRef"
      />
    </div>
  </div>
</template>

<script>
// import ListUser from '../components/ListUser'
import SharedRoom from '../components/SharedRoom.vue'
import axios from 'axios'
export default {
  components: {
    SharedRoom
  },
  data () {
    return {
      currentRoom: '',
      messages: [],
      usersOnline: [],
      messageContainer: null
    }
  },
  created () {
    this.getMessages()
    this.currentRoom = this.$route.params.roomId
  },
  mounted() {
    window.Echo.private(`room.${this.$route.params.roomId}`)
        .listen('NewMessage', (data) => {

            this.messages.push(data.message)

            this.$nextTick(() => {
              this.messageContainer.scrollTop = this.messageContainer.scrollHeight;
            });
        })
  },
  methods: {
    async getMessages () {
      try {
        const response = await axios.get(`/messages?room=${this.$route.params.roomId}`)
        this.messages = response.data.data

          this.$nextTick(() => {
            this.messageContainer.scrollTop = this.messageContainer.scrollHeight;
          });
      } catch (error) {
        console.log(error)
      }
    },
    saveMessage (content) {
        axios.post('/messages-store', {                    
            'content': content,
            'room': this.currentRoom
        }, {
            headers: {
                'X-Socket-ID': window.Echo.socketId()
            }
        })
        .then(response=>{
            console.log('Send message successful')
            this.messages.push(response.data.message)

            this.$nextTick(() => {
              this.messageContainer.scrollTop = this.messageContainer.scrollHeight;
            });
            
        }).catch(error => {
            console.log(error)
        })
    
    },

    getRef(ref) {
      this.messageContainer = ref
    },
  },
  beforeUnmount() {
    Echo.leave(`room.${this.$route.params.roomId}`)
  }
}
</script>

<style>
</style>