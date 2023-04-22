<template>
  <div class="row justify-content-center h-100">
    <div class="col-md-8 chat">
      <div class="card mb-sm-3 mb-md-0 contacts_card">
        <div class="card-header">
          <h3 class="d-flex text-white">Chatroom</h3>
          </div>
          <div class="card-body contacts_body">
          <div class="contacts">
            <li
              v-for="room in listRooms"
              :key="room.id"
            >
            
              <router-link :to="`/room/${room.id}`">
                <div class="d-flex bd-highlight">
                  <div class="user_info">
                      <span>{{ room.name }}</span>
                  </div>
                </div>
              </router-link>
            </li>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      listRooms: this.$rooms
    }
  },
}
</script>