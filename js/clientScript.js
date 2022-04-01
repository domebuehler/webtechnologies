
// Übernommen von https://vuejs.org/v2/guide/list.html
var vueForList = new Vue({
    el: '#hinweisliste',
    data: {
      hinweise: [
        { message: 'es muss mindestens eine Berechungsart gewählt werden' },
        { message: 'die eingebenen Werte müssen grösser als 0 sein' },
        { message: 'die eingebenen Werte müssen kleiner als 1000 sein' },
        { message: 'Buchstaben oder Sonderzeichen werden als Eingabe nicht aktzeptiert' },
        { message: 'es muss eine Einheit ausgewählt werden' },
        { message: 'die Angaben müssen in der richtigen Einheit gemacht werden' }
      ]
    }
  });