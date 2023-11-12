/*!
* Start Bootstrap - Freelancer v7.0.7 (https://startbootstrap.com/theme/freelancer)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-freelancer/blob/master/LICENSE)
*/
//
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

    
    $(document).ready(function () {
        $('#filterModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var modal = $(this);
    
            // Vous pouvez personnaliser le titre de la modal en fonction du bouton cliqué
            modal.find('.modal-title').text('Filtrer par ' + button.text());
    
            // Vous pouvez personnaliser le contenu de la modal en fonction du bouton cliqué
            var modalContent = modal.find('#modalContent');
            
            // Effacez le contenu actuel de la modal
            modalContent.empty();
    
            // Ajoutez le contenu spécifique en fonction du bouton cliqué
            if (button.text() === 'Catégorie') {
                modalContent.html('Contenu spécifique du filtre Catégorie');
            } else if (button.text() === 'Titre') {
                modalContent.html('Contenu spécifique du filtre Titre');
            } else if (button.text() === 'Ingrédients') {
                modalContent.html('Contenu spécifique du filtre Ingrédients');
            }
        });
    });
});
