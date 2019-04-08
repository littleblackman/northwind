$(document).ready(function() {
    $('#header').prepend('<h1 class="h3">base de donnée Northwind</h1>');
    $('tr:even').css('background-color', 'rgb(153, 204, 255)');
    $('tr').css({'border': '1px', 
                 'style-color': 'black', 
                 'border-style': 'solid', 
                 'text-align': 'center'
                });
    $('table').css({'boder-collapse': 'collapse', 'width': '80%'});
    $('#tr_header').css({'text-align': 'center', 'background-color': 'rgb(255, 194, 153)'});    

    $('#spanNorthwind').css('color', 'red');
});

