<template>
  <div class="app-container">
    <div class="container position-relative chat-container">
      <div class="d-flex app-header">
        <router-link to="/" class="flex-grow-1" style="text-decoration: none;">
          <h2 class="text-white">
            Realtime Chat App
          </h2>
        </router-link>
        <div class="btn-logout">
          <a class="btn btn-danger" href="/logout"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
          </a>

          <form id="logout-form" action="/logout" method="POST" style="display: none;">
            <input type="hidden" name="_token" :value="csrfToken">
          </form>
        </div>
      </div>

      <router-view />
    </div>
  </div>
</template>

<script>
import Chat from './components/Chat.vue'
export default {
  components: {Chat},
  data() {
    return {
      csrfToken: document.head.querySelector('meta[name="csrf-token"]').content
    };
  }
};
</script>

<style lang="scss">
body, html {
    height: 100%;
    margin: 0;
}
.app-container {
    height: 100vh;
    background: #0c0f11;
    background-image: -o-linear-gradient(0deg, #76797a, #052d38);
    background-image: -moz-linear-gradient(0deg, #76797a, #052d38);
    background-image: -webkit-linear-gradient(0deg, #76797a, #052d38);
    background-image: linear-gradient(0deg, #76797a, #052d38);
}
.app-container .app-header {
    position: absolute;
    width: 100%;
    top: 30px;
}
.app-container .app-header .btn-logout {
    margin-right: 30px;
}
.app-container .chat-container {
    height: 95%;
}
.chat {
    margin-top: auto;
    margin-bottom: auto;
}
.chat .card {
    height: 500px;
    border-radius: 15px !important;
    background-color: rgba(0, 0, 0, 0.4) !important;
}
.chat .card .card-header {
    border-radius: 15px 15px 0 0 !important;
    border-bottom: 0 !important;
}
.chat .card .card-header .search_btn {
    border-radius: 0 15px 15px 0 !important;
    background-color: rgba(0, 0, 0, 0.3) !important;
    border: 0 !important;
    color: white !important;
    cursor: pointer;
}
.chat .card .card-header .search {
    border-radius: 15px 0 0 15px !important;
    background-color: rgba(0, 0, 0, 0.3) !important;
    border: 0 !important;
    color: white !important;
}
.chat .card .card-header .search:focus {
    box-shadow: none !important;
    outline: 0px !important;
}
.chat .card .msg_head {
    position: relative;
}
.chat .card .msg_card_body {
    overflow-y: auto;
}
.chat .card .card-footer {
    border-radius: 0 0 15px 15px !important;
    border-top: 0 !important;
}
.chat .card .card-footer .type_msg {
    background-color: rgba(0, 0, 0, 0.3) !important;
    border: 0 !important;
    color: white !important;
    height: 60px !important;
    overflow-y: auto;
    border-radius: 15px 0 0 15px !important;
}
.chat .card .card-footer .type_msg:focus {
    box-shadow: none !important;
    outline: 0px !important;
}
.chat .card .card-footer .send_btn {
    border-radius: 0 15px 15px 0 !important;
    background-color: rgba(0, 0, 0, 0.3) !important;
    border: 0 !important;
    color: white !important;
    cursor: pointer;
}
.chat .contacts_body {
    padding: 0.75rem 0 !important;
    overflow-y: auto;
    white-space: nowrap;
}
.chat .contacts_body .contacts {
    list-style: none;
    padding: 0;
}
.chat .contacts_body .contacts li {
    width: 100% !important;
    padding: 5px 10px;
    transition: background-color .2s;
    cursor: pointer;
    position: relative;
}
.chat .contacts_body .contacts li:hover {
    background-color: rgba(0, 0, 0, 0.3);
}
.chat .contacts_body .contacts li.active {
    background-color: rgba(0, 0, 0, 0.3);
}
.chat .contacts_body .contacts li .current-user-mark {
    height: 100%;
    width: 3px;
    background: #00ffa4;
    position: absolute;
    left: 0;
    top: 0;
}
.chat .contacts_body .contacts li .img_cont {
    position: relative;
}
.chat .contacts_body .contacts li .img_cont .user_img {
    height: 45px;
    width: 45px;
    border: 2px solid #f5f6fa;
}
.container {
    align-content: center;
}
.user_img_msg {
    height: 40px;
    width: 40px;
    border: 2px solid #f5f6fa;
}
.online_icon {
    position: absolute;
    height: 15px;
    width: 15px;
    background-color: #4cd137;
    border-radius: 50%;
    bottom: 17px;
    right: 0;
    border: 2px solid white;
}
.offline {
    background-color: #c23616 !important;
}
.user_info {
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 15px;
}
.user_info span {
    font-size: 20px;
    color: white;
}
.user_info p {
    font-size: 10px;
    color: rgba(255, 255, 255, 0.6);
}
.msg_container {
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 10px;
    border-radius: 25px;
    background-color: #00a0e5;
    padding: 10px;
    position: relative;
    color: white;
    word-break: break-word;
    max-width: 70%;
}
.msg_container_send {
    margin-top: auto;
    margin-bottom: auto;
    margin-right: 10px;
    border-radius: 25px;
    background-color: #42e274;
    padding: 10px;
    position: relative;
    color: white;
    word-break: break-word;
    max-width: 70%;
}
@media (max-width: 768px) {
    .app-container {
        height: auto !important;
    }
    .app-container .app-header {
        position: initial;
        padding-top: 30px;
    }
    .app-container .app-header .btn-logout {
        margin-right: 0;
    }
    .app-container .chat {
        margin-top: 1rem;
    }
    .app-container .chat:last-child, .app-container .chat:first-child {
        margin-top: 1rem;
    }
}
@media (max-width: 576px) {
    .contacts_card {
        margin-bottom: 15px !important;
    }
}
.font-12px {
    font-size: 12px !important;
}
.private-message-container {
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    background-color: white;
    position: absolute;
    bottom: 0;
    right: 10px;
    width: 300px;
}
.private-message-container.expand {
    height: 350px;
}
.private-message-container .chat-header {
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    transition: background-color .2s;
    cursor: pointer;
}
.private-message-container .chat-header:hover {
    background-color: #e6e5e5;
}
.private-message-container .chat-header .img_cont {
    position: relative;
}
.private-message-container .chat-header .btn-close {
    position: absolute;
    right: 15px;
    top: 15px;
    outline: none;
    border: none;
    background: none;
}
.private-message-container .chat-header .btn-close i {
    font-size: 18px;
    transition: transform .2s;
}
.private-message-container .chat-header .btn-close i:hover {
    transform: scale(1.2);
}
.private-message-container .private-chat-body {
    height: calc(100% - 65px - 40px);
    overflow-y: scroll;
}
.private-message-container .private-chat-body .msg_container_send {
    padding: 5px 10px 5px 10px !important;
    border-radius: 15px !important;
    max-width: 165px;
}
.private-message-container .private-chat-body .msg_container {
    padding: 5px 10px 5px 10px !important;
    border-radius: 15px !important;
    max-width: 165px;
}
.private-message-container .private-chat-body .img_cont_msg img {
    width: 30px;
    height: 30px;
}
.private-message-container .text-input input {
    height: 40px;
    border: none;
    border-top: solid 1px #ddd;
    outline: none;
    padding: 7px;
    font-size: 12px;
}
@keyframes wave {
    0%, 60%, 100% {
        transform: initial;
    }
    30% {
        transform: translateY(-15px);
    }
}
#wave .dot {
    display: inline-block;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    margin-right: 2px;
    background: white;
    animation: wave 1.3s linear infinite;
}
#wave .dot:nth-child(2) {
    animation-delay: -1.1s;
}
#wave .dot:nth-child(3) {
    animation-delay: -0.9s;
}
.blink-anim {
    animation: blink 2s infinite;
}
@keyframes wave {
    0%, 60%, 100% {
        transform: initial;
    }
    30% {
        transform: translateY(-7px);
    }
}
@keyframes blink {
    0%, 100% {
        background: white;
    }
    50% {
        background: #2e7fd7;
    }
}

</style>