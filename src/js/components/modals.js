import MicroModal from 'micromodal';

export const modals = () => {
  MicroModal.init({
    openTrigger: 'data-micromodal-open',
    closeTrigger: 'data-micromodal-close',
    openClass: 'is-open',
    disableScroll: true,
    disableFocus: true,
    awaitOpenAnimation: true,
    awaitCloseAnimation: true,
    onShow: (modal, trigger) => {
      //todo if artwork modal -> add class to disable overflow.
      // artworkModalOverflow(false);
    },
    onClose: (modal, trigger) => {
      // artworkModalOverflow(true);
    },
  });
};

export const artworkModalOverflow = (ovefrlow) => {
  const artworkModal = document.querySelector('.artwork-modal.opened');
  if (artworkModal) {
    if (ovefrlow === false) {
      artworkModal.classList.add('micromodal-opened');
    } else {
      artworkModal.classList.remove('micromodal-opened');
    }
  }
};
