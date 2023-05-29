import Vue from 'vue';

Vue.defineComponent('componente' ,{
    template: `
    <div>
        <h1>Olá yags!</h1>
        <button @click="alterarMensagem">Alterar mensagem</button>
    </div>
`,
data(){
    return{
        mensagem: 'Olá yags!'
    };
},
methods: {
    alterarMensagem(){
     this.mensagem = 'Mensagemm alterada!';
    }
}
})