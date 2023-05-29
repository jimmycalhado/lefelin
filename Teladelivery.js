<script src="https://cdnjs.cloudflare.com/ajax/libs/geolib/3.4.3/geolib.min.js"></script>
new Vue({
    el: '#app',
    data: {
      cep: '',
      endereco: '',
      frete: 0
    },
    methods: {
      buscarCep() {
        if (this.cep.length === 0) {
          alert('Por favor, digite um CEP válido');
          return;
        }

        fetch(`https://viacep.com.br/ws/${this.cep}/json/`)
          .then(response => response.json())
          .then(data => {
            if (data.erro) {
              alert('CEP não encontrado');
            } else {
              this.endereco = `${data.logradouro}, ${data.bairro}, ${data.localidade}, ${data.uf}`;
              this.frete = this.calcularFrete(data.cep);
            }
          })
          .catch(error => {
            console.error('Erro na requisição:', error);
          });
      },
      calcularFrete(cep) {
        const lojaCEP = '66615-030';
  
        // Obter as coordenadas dos CEPs
        const cepOrigem = lojaCEP.replace(/\D/g, '');
        const cepDestino = cep.replace(/\D/g, '');
        Promise.all([this.obterCoordenadas(cepOrigem), this.obterCoordenadas(cepDestino)])
          .then(([coordOrigem, coordDestino]) => {
            // Calcular a distância entre as coordenadas
            const distancia = geolib.getDistance(coordOrigem, coordDestino) / 1000; // Converter para quilômetros
            const frete = distancia * 0.5; // Substitua 0.5 pelo valor da taxa de frete desejada
            this.frete = frete;
          })
          .catch(error => {
            console.error('Erro ao obter as coordenadas:', error);
          });
      },
      obterCoordenadas(cep) {
        return new Promise((resolve, reject) => {
          fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
              if (data.erro) {
                reject(new Error('CEP não encontrado'));
              } else {
                resolve({ latitude: parseFloat(data.lat), longitude: parseFloat(data.lon) });
              }
            })
            .catch(error => {
              reject(error);
            });
        });
      }
    }
  })