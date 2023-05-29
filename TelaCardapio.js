
new Vue({
    el: '#app',
    data:{
        showAllImages: false
    },
    methods: {
        toggleShowAllImagens() {
            this.showAllImages = !this.showAllImages;
        }
    },
});