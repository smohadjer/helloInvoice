var template, templateData;

Promise.all([
  fetch('invoice-template.hbs').then(response => response.text()).then(data => {template = data}),
  fetch('invoice-data.json').then(response => response.json()).then(data => {
    templateData = data
  })
]).then(function() {
  const temp = Handlebars.compile(template)
  const html = temp(templateData);
  document.body.innerHTML = html;
});