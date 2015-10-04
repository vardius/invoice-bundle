/**
 * This file is part of the vcard package.
 *
 * (c) Rafał Lorenz <vardius@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

var $collectionHolder;
var $addItemLink = $('<a href="#" class="add_item_link">Add a item</a>');
var $newLinkLi = $('<li></li>').append($addItemLink);

jQuery(document).ready(function () {
    $collectionHolder = $('ul.items');
    $collectionHolder.find('li').each(function () {
        addItemFormDeleteLink($(this));
    });

    $collectionHolder.append($newLinkLi);
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addItemLink.on('click', function (e) {
        e.preventDefault();

        addItemForm($collectionHolder, $newLinkLi);
    });
});

function addItemForm($collectionHolder, $newLinkLi) {
    var prototype = $collectionHolder.data('prototype');
    var index = $collectionHolder.data('index');
    var newForm = prototype.replace(/__name__/g, index);

    $collectionHolder.data('index', index + 1);

    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);

    addItemFormDeleteLink($newFormLi);
}

function addItemFormDeleteLink($tagFormLi) {
    var $removeFormA = $('<a href="#">delete this item</a>');
    $tagFormLi.append($removeFormA);

    $removeFormA.on('click', function (e) {
        e.preventDefault();

        $tagFormLi.remove();
    });
}