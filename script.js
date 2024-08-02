

  // Project image change on hover
  const projectImage = document.getElementById('project-image');
  const projectItems = document.querySelectorAll('.project-list div');

  projectItems.forEach(item => {
      item.addEventListener('mouseover', () => {
          const newImage = item.getAttribute('data-image');
          projectImage.style.opacity = 0;
          setTimeout(() => {
              projectImage.src = newImage;
              projectImage.style.opacity = 1;
          }, 300);
      });
  });

