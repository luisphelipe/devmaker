<template>
    <div class="card">
        <div class="card-header">Novo post</div>
        <form  action="/post" method="POST">
            <!-- <input type="hidden" name="_token" :value="csrf"> -->

            <div class="d-flex justify-content-center align-items-center mt-1 border-bottom">
                <div class="form-group w-75">
                    <input class="form-control my-2" type="text" placeholder="Titulo" v-model="title" minlength="3">
                    <textarea class="form-control" placeholder="Conteudo" v-model="body" minlength="3"></textarea>
                </div>

                <button class="btn mx-2" type="submit" @click.prevent="newPost()">Postar</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data: () => ({
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            title: '',
            body: ''
        }),
        methods: { 
            newPost() {
                axios
                .post('http://localhost:8000/post', {
                    'title': this.title,
                    'body': this.body
                })
                .then(response => {
                    this.$emit('new-post', response.data);
                    console.log(response.data)
                });

                this.title = '';
                this.body = '';
            }
        },
        mounted() {
            console.log('post-form mounted.')
        }
    }
</script>
