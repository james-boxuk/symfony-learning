window.addEventListener('load', () => {
  setContactForm();
});


function setContactForm() {
  const contactForm = document.querySelector('.title-selection');

  contactForm.addEventListener('change', (e) => {
    let selectedValue = e.target.value;
    let otherTitles = document.querySelectorAll('.title-other');

    if (selectedValue === 'other') {
      otherTitles.forEach( (item) => {
        item.classList.remove('hidden');
      });
    } else {
      otherTitles.forEach((item) => {
        item.classList.add('hidden');
      });
    }
  });

  contactForm.addEventListener('load', (e) => {
    let selectedValue = e.target.value;
    console.log('here');
    if (selectedValue === 'other') {
      otherTitles.forEach((item) => {
        item.classList.remove('hidden');
      });
    }
  });
}
