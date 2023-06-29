<template>
    <div class="card m-4">
        <div class="card-header">
            Chat {{ routeparams }}
        </div>
        <div class="card-body overflow-auto" style="height: 400px;">
            <ChatItem v-for="(message, index) in list_messages" :key="index" :message="message"></ChatItem>
            <span id="newMes"></span>
        </div>
        <div class="card-footer d-flex">
            <input type="text" v-model="message" @keyup.enter="sendMessage" class="form-control"
                placeholder="Type message..." />
            <button type="button" class="mx-1 btn btn-primary" @click="sendMessage"><i
                    class="fas fa-paper-plane"></i></button>
        </div>
    </div>
</template>

<script>
import ChatItem from './ChatItem.vue'
export default {
    components: {
        ChatItem
    },
    data() {
        return {
            message: '',
            list_messages: [],
            routeparams: ''
        }
    },
    created() {
        this.loadMessage()
        Echo.channel('laravel_database_chatroom')
            .listen('MessagePosted', (data) => {
                let message = data.message
                message.user = data.user
                this.list_messages.push(message)
            })
        window.location.hash = 'newMes';
    },
    methods: {
        async loadMessage() {
            try {
                this.routeparams = location.pathname.split('/')[2]
                const response = await axios.get('/messages', { params: { useridreceiver: this.routeparams } })
                this.list_messages = response.data
                window.location.hash = 'newMes';
            } catch (error) {
                console.log(error)
            }
        },
        async sendMessage() {
            try {
                this.routeparams = location.pathname.split('/')[2]
                const response = await axios.post('/messages', {
                    message: this.message,
                    useridreceiver: this.routeparams
                })
                this.list_messages.push(response.data.message)
                this.message = ''
                window.location.hash = 'newMes';
            } catch (error) {
                console.log(error)
            }
        }
    }
} 
</script>