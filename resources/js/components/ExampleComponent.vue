<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Info</div>

                    <div class="card-body">
                        {{user.name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {}
            }
        },
        mounted() {
            console.log('Component mounted.');
            window.Echo.channel('chat')
                .listen('NewMessage', (data) => {
                    console.log('data', data)
                    this.user = data.user
                })
        }
    }
</script>
