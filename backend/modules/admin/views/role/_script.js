$('i.glyphicon-refresh-animate').hide();
function updateItems(r) {
    _opts.items.avaliable = r.avaliable;
    _opts.items.assigned = r.assigned;
    search('avaliable');
    search('assigned');
}

$('.btn-assign').click(function () {
    var $this = $(this);
    var target = $this.data('target');
    var items = $('select.list[data-target="' + target + '"]').val();

    if (items && items.length) {
        $this.children('i.glyphicon-refresh-animate').show();
        $.post($this.attr('href'), {items: items}, function (r) {
            updateItems(r);
        }).always(function () {
            $this.children('i.glyphicon-refresh-animate').hide();
        });
    }
    return false;
});

$('.search[data-target]').keyup(function () {
    search($(this).data('target'));
});

function search(target) {
    var $list = $('select.list[data-target="' + target + '"]');
    $list.html('');
    var q = $('.search[data-target="' + target + '"]').val();

    var groups = {
        permission: [$('<optgroup label="Permission">'), false],
    };
    $.each(_opts.items[target], function (route,obj) {
        if (route.indexOf(q) >= 0) {
            $('<option>').text(obj.name+'|'+route).val(obj.id).appendTo(groups['permission'][0]);
            groups['permission'][1] = true;
        }
    });
    $.each(groups, function () {
        if (this[1]) {
            $list.append(this[0]);
        }
    });
}

// initial
search('avaliable');
search('assigned');
