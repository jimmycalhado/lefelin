new Vue({
    el: '#carousel',
    data: {
         imagens: [
           'balcao.jpg',
           'entrada.jpg',
           'mesas.jpg',
           'sala.jpg',
           'café.jpg',
         ],
         indice: 0,
         intervalo: null
       },
    mounted(){
        this.iniciarCarrossel();
    },
    methods: {
        slideAnterior() {
            this.indice = (this.indice === 0) ? this.imagens.length - 1 : this.indice - 1;
          },
         slideSeguinte() {
            this.indice = (this.indice === this.imagens.length - 1) ? 0 : this.indice + 1;
          },
        iniciarCarrossel() {
            this.intervalo = setInterval(()=>{
                this.slideSeguinte();
            }, 7000);
        },
        pausarCarrosel() {
            clearInterval(this.intervalo);
        }
       },
    beforeDestroy() {
        this.pausarCarrosel();
    },
     });
    