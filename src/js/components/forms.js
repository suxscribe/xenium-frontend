import JustValidate from 'just-validate';

export const setFormValidation = () => {
  // Inputmask({
  //   mask: '+7 999 999 99 99',
  //   placeholder: ' ',
  //   // clearIncomplete: true,
  // }).mask(document.querySelectorAll('.form__phone'));

  const forms = document.querySelectorAll('.form');

  forms.forEach((form) => {
    let validator = new JustValidate(form, {
      errorLabelCssClass: 'form__note',
    });

    if (form.querySelector('#form-name')) {
      validator.addField('#form-name', [
        { rule: 'required', errorMessage: 'Required field' },
      ]);
    }
    if (form.querySelector('#form-text')) {
      validator.addField('#form-text', [
        { rule: 'required', errorMessage: 'Required field' },
      ]);
    }

    if (form.querySelector('#form-email')) {
      validator.addField('#form-email', [
        { rule: 'email', errorMessage: 'Email is incorrect' },
      ]);
    }
    // .addField('#form-phone', [
    //   {
    //     rule: 'customRegexp',
    //     value:
    //       /^[\+]?[\s]?[0-9]{1}[\s][0-9]{3}[\s]?[0-9]{3}[-\s]?[0-9]{2}[-\s]?[0-9]{2}$/im,
    //     errorMessage: 'Обязательное поле',
    //   },
    // ])
    validator
      .onSuccess((e) => {
        e.preventDefault();
        console.log('form passed');
      })
      .onFail((e) => {
        console.log('form fail');
      });
  });
};
