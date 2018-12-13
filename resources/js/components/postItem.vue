<template>
    <div>
        <div class="d-flex justify-content-between">
            <h5 class="card-title">
                {{ title }} <span class="card-subtitle text-muted">{{ name }}</span>
            </h5>
            <form action="/favorite" method="POST">
                <!-- <input type="hidden" name="_token" :value="csrf"> -->
                <!-- <input type="hidden" name="post_id" :value="key"> -->

                <a href="#" @click.prevent="toggleFav">
                    <img v-if="favorite" src="/svg/heart.svg" alt="Fav" style="width: 15px">
                    <img v-else src="/svg/heart-outline.svg" alt="Fav" style="width: 15px">
                </a>
                <!-- <button class="btn" type="submit" hidden></button> -->
                
            </form>
        </div>
        <p class="card-text">
            <slot>
                ...
            </slot>
        </p>
        <hr>
    </div>
</template>

<script>
    export default {
        props: ['title', 'name', 'fav', 'chav'],
        data: () => ({
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            url: document.querySelector('meta[name="req-url"]').getAttribute('content'),
            favorite: false,
        }),
        methods: { 
            toggleFav() {
                this.favorite = !this.favorite;
                this.$emit('toggle-fav', this.chav)

                axios
                .post(this.url + '/favorite', {
                    'post_id': this.chav
                })
                .then(response => {
                    console.log(response.data);
                });
            }
        },
        mounted() {
            this.favorite = this.fav;
            console.log('post-item mounted.');
        }
    }
</script>
