<template>
  <div class="card">
    <div class="card-header msg_head">
      <div class="bd-highlight">
        <div class="user_info">
          <span>GROUP CHAT {{ currentRoom }}</span>
        </div>
      </div>
    </div>
    <div class="card-body msg_card_body" id="shared_room" ref="messageContainer">

        <div v-for="message in messages" :key="message.id" >
            <div class="d-flex justify-content-end mb-4" v-if="message.sender.id === this.$authUser.id">
                <div class="msg_container_send" data-toggle="tooltip" data-placement="top" :title="message.created_at">
                {{ message.content }}
                </div>
                <div class="img_cont_msg" data-toggle="tooltip" data-placement="top" :title="`${message.sender.name} (${message.sender.email})`">
                  <avatar :name="message.sender.name"></avatar>
                </div>
            </div>

            <div class="d-flex justify-content-start mb-4" v-else>
                <div class="img_cont_msg" data-toggle="tooltip" data-placement="top" :title="`${message.sender.name} (${message.sender.email})`">
                <avatar :name="message.sender.name"></avatar>
                </div>
                <div class="msg_container" data-toggle="tooltip" data-placement="top" :title="message.created_at">
                {{ message.content }}
                </div>
            </div>

        </div>


    </div>
    <div class="card-footer">
      <div class="input-group">
        <textarea
          v-model="inputMessage"
          name=""
          class="form-control type_msg"
          placeholder="Type your message..."
          @keyup.enter="sendMessage"
        />
        <div class="input-group-append">
          <span @click="sendMessage" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Avatar from "vue3-avatar";
export default {
  components : {
    Avatar,
  },
  props: {
    messages: {
      type: Array,
      required: true
    },
    currentRoom: {
      type: String,
      required: true
    },
    saveMessage: {
      type: Function,
      required: true
    }
  },
  data () {
    return {
      inputMessage: ''
    }
  },
  mounted() {
    this.$emit('sendRef', this.$refs.messageContainer)
  },
  methods: {
    sendMessage () {
      this.saveMessage(this.inputMessage);
      this.inputMessage = ''
    }
  }
}
</script>

<style>
.avatar {
  display: inline-block;
  width: 50px;
  height: 50px;
  line-height: 50px;
  text-align: center;
  border-radius: 50%;
  background-color: #ccc;
  color: #fff;
  font-size: 24px;
  font-weight: bold;
}
</style>