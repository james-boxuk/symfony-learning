window.addEventListener('load', () => {
  const contactForm = document.querySelector('.title-selection');

  contactForm.addEventListener('change', (e) => {
      let selectedValue = e.target.value;
      let titleOthers = document.querySelectorAll('.title-other');

      if (selectedValue === 'other') {
        titleOthers.forEach( (item) => {
          item.classList.remove('hidden');
        });
      } else {
        titleOthers.forEach((item) => {
          item.classList.add('hidden');
        });
      }
  });

});

