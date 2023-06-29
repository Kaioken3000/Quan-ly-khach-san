<template>
    <div class="justify-content-end" v-if="$root.currentUserLogin.id === message.user_id_sender">
        <span class="d-flex gap-2 flex-row-reverse align-items-end">
            <div>
                <img src="/adminresource/assets/img/avatars/blank.jpeg" class="rounded-circle mb-3" style="width: 40px;"
                    alt="Avatar" />
            </div>
            <div>
                <p class="m-1"><strong>{{ message.user_id_sender }}</strong></p>
                <p class="bg-primary rounded-3 text-white px-2 py-1" style="max-width: 500px;">
                    {{ message.message }}</p>
            </div>
        </span>
    </div>
    <div class="d-flex align-items-end gap-2" v-else>
        <div>
            <img src="/adminresource/assets/img/avatars/blank.jpeg" class="rounded-circle mb-3" style="width: 40px;"
                alt="Avatar" />
        </div>
        <div>
            <p class="m-1"><strong>{{ message.user_id_sender }}</strong></p>
            <p class="bg-success rounded-3 text-white px-2 py-1" style="max-width: 500px;">
                {{ message.message }}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        message: {
            type: Object,
            default: {}
        }
    }
}
</script>
