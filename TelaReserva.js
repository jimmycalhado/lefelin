new Vue({
    el: '#reservation-app',
    data: {
      daysOfWeek: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
      selectedDay: null,
      timeslots: ['10:00', '11:00', '12:00', '13:00', '14:00'],
      selectedTime: null
    },
    methods: {
      selectDay(index) {
        this.selectedDay = index;
        this.selectedTime = null;
      },
      selectTime(time) {
        this.selectedTime = time;
      }
    }
});