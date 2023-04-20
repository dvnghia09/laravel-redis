<template>
    <div class="container">
        <div class="row justify-content-center" v-for="(item, index) in messages" :key="index">
            <!-- <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Info</div>

                    <div class="card-body">
                        {{user.name}}
                    </div>
                </div>
            </div> -->
            <div class="box">
                <span>{{ item.user.name }}</span>
                <p>{{ item.message }}</p>
                <span class="time-right">11:00</span>
            </div>

            <!-- <div class="box darker">
                <span>name</span>
                <p>Hey! I'm fine. Thanks for asking!</p>
                <span class="time-left">11:01</span>
            </div>

            <div class="box">
                <span>name</span>
                <p>Sweet! So, what do you wanna do today?</p>
                <span class="time-right">11:02</span>
            </div>

            <div class="box darker">
                <span>name</span>
                <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                <span class="time-left">11:05</span>
            </div> -->
        </div>
        <form @submit.prevent="" method="post">
            <input v-model="content" type="text" name="content">    
            <button @click="add">Send</button>
            {{content }}
        </form>

        <audio id="noti">
            <source src="https://notificationsounds.com/storage/sounds/file-sounds-1233-elegant.mp3" type="audio/mpeg">
        </audio>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        props: {
            authUser: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                user: {},
                messages: [],
                content: '',
            }
        },
        mounted() {
            console.log('Component mounted.');
            window.Echo.private('chat')
                .listen('NewMessage', (data) => {
                    document.getElementById('noti').play();
                    this.messages.push(data)

                })
        },
        methods:{
             add(){
                console.log(this.authUser);
                axios.post('/test-event', {                    
                    'content': this.content,
                    'user' : this.authUser,
                }, {
                    headers: {
                        'X-Socket-ID': window.Echo.socketId()
                    }
                })
                    .then(response=>{
                        console.log('Send message successful')
                        this.messages.push({                    
                            'message': this.content,
                            'user' : this.authUser,
                        })
                    }).catch(error => {
                        console.log(error)
                    })
        },
        }
    }
</script>
