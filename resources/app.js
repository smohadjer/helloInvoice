const init = () => {
  const select = document.querySelector('#invoice');
  const download = document.querySelector('.download');
  setEventListeners(select, download);
  fetchInvoice(select.value);
};

const setEventListeners = (select, download) => {
  select.addEventListener('change', () => fetchInvoice(select.value));
  download.addEventListener('click', () => window.print());
};

const fetchInvoice = (data) => {
  fetch(data)
  .then(response => response.json())
  .then(data => {
    fetch(data.template)
    .then(response => response.text())
    .then(template => {
      const temp = Handlebars.compile(template)
      const html = temp(data);
      document.querySelector('main').innerHTML = html;
    });
  });
};

init();







