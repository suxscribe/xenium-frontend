import Accordion from 'accordion-js';

export const faqAccordion = () => {
  if (document.querySelector('.accordion')) {
    new Accordion('.accordion', {
      elementClass: 'accordion__item',
      triggerClass: 'accordion__item-trigger',
      panelClass: 'accordion__item-panel',
    });
  }
};
