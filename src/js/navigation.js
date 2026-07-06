(function () {
    'use strict';

    function closeItem(item) {
        var toggle = item.querySelector(':scope > .sub-menu-toggle');
        item.classList.remove('sub-menu-open');
        if (toggle) {
            toggle.setAttribute('aria-expanded', 'false');
        }
    }

    function closeSiblings(item) {
        var parentList = item.parentElement;
        if (!parentList) {
            return;
        }
        Array.prototype.forEach.call(parentList.children, function (sibling) {
            if (sibling !== item) {
                closeItem(sibling);
                Array.prototype.forEach.call(sibling.querySelectorAll('.sub-menu-open'), closeItem);
            }
        });
    }

    document.addEventListener('click', function (event) {
        var toggle = event.target.closest('.sub-menu-toggle');
        if (!toggle) {
            return;
        }

        event.preventDefault();

        var item = toggle.closest('.menu-item-has-children');
        if (!item) {
            return;
        }

        var isOpen = item.classList.contains('sub-menu-open');

        closeSiblings(item);

        if (isOpen) {
            closeItem(item);
        } else {
            item.classList.add('sub-menu-open');
            toggle.setAttribute('aria-expanded', 'true');
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key !== 'Escape') {
            return;
        }
        Array.prototype.forEach.call(document.querySelectorAll('.sub-menu-open'), closeItem);
    });

    document.addEventListener('click', function (event) {
        var openItems = document.querySelectorAll('#primary-navigation .sub-menu-open');
        if (!openItems.length) {
            return;
        }
        Array.prototype.forEach.call(openItems, function (item) {
            if (!item.contains(event.target)) {
                closeItem(item);
            }
        });
    });
})();
