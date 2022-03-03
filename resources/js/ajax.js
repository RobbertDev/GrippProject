$( document ).ready(function() {
    $('button#create-pet').click(function(){
        $.ajax({
            type: 'POST',
            url: '/pets',
            data: $('#create-pet-form').serializeArray(),
            success: function (data) {
                $('#create-pet-form').trigger("reset");

                if(typeof data.msg !== 'undefined') {
                    $("#error-message").html(data.msg);
                }

                if(typeof data.item !== 'undefined') {
                    $('#dog-counter').html(data.count[0]);
                    $('#cat-counter').html(data.count[1]);
                    $('#fish-counter').html(data.count[2]);
                    $('#rabbit-counter').html(data.count[3]);

                    $('#overview-content').append('' +
                        '<div id="pet-'+ data.item.id+'" class="table-row">' +
                        '<div class="table-cell">' + data.item.id + '</div>' +
                        '<div class="table-cell">' + data.item.name + '</div>' +
                        '<div class="table-cell">' + data.item.type + '</div>' +
                        '<div class="table-cell">' + data.item.address + '</div>' +
                        '<div class="table-cell">' +
                        '<button pet-id="' + data.item.id + '" class="destroy-pet py-2 px-4 font-bold leading-none bg-red-500 hover:bg-red-500/90 text-white rounded-lg">Delete</button>' +
                        '</div>' +
                        '</div>');
                }
            }
        });
    });

    $('button.destroy-pet').click(function(){
        $.ajax({
            type: 'DELETE',
            url: '/pets/'+$(this).attr("pet-id"),
            success: function (data) {
                if(typeof data.html !== 'undefined') {
                    $('#dog-counter').html(data.count[0]);
                    $('#cat-counter').html(data.count[1]);
                    $('#fish-counter').html(data.count[2]);
                    $('#rabbit-counter').html(data.count[3]);

                    $('#pet-'+data.id).remove();
                }
            }
        });
    });
});
