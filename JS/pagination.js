// brands pagination
$(document).ready(function(){
    $('#data').after('<div id="nav"></div>');
    var rowsShown = 7;
    var rowsTotal = $('#data tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#data tbody tr').hide();
    $('#data tbody tr').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(){

        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
        return false;

    });
});


// products pagination
$(document).ready(function(){
    
    $('#data2').after('<div id="nav2"></div>');
    var rowsShown = 6;
    var rowsTotal = $('#data2 tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav2').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#data2 tbody tr').hide();
    $('#data2 tbody tr').slice(0, rowsShown).show();
    $('#nav2 a:first').addClass('active');
    $('#nav2 a').bind('click', function(){
    
        $('#nav2 a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#data2 tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
        return false;
    });

});

// categories pagination
$(document).ready(function(){
    $('#data3').after('<div id="nav3"></div>');
    var rowsShown = 7;
    var rowsTotal = $('#data3 tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav3').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#data3 tbody tr').hide();
    $('#data3 tbody tr').slice(0, rowsShown).show();
    $('#nav3 a:first').addClass('active');
    $('#nav3 a').bind('click', function(){

        $('#nav3 a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#data3 tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
        return false;
    });
});



// orders pagination
$(document).ready(function(){
    $('#or_data').after('<div id="ordNav"></div>');
    var rowsShown = 4;
    var rowsTotal = $('#or_data tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#ordNav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#or_data tbody tr').hide();
    $('#or_data tbody tr').slice(0, rowsShown).show();
    $('#ordNav a:first').addClass('active');
    $('#ordNav a').bind('click', function(){
    
        $('#ordNav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#or_data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
        return false;
    });
});



// payments pagination
$(document).ready(function(){
    
    $('#tr_data').after('<div id="trNav"></div>');
    var rowsShown = 15;
    var rowsTotal = $('#tr_data tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#trNav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#tr_data tbody tr').hide();
    $('#tr_data tbody tr').slice(0, rowsShown).show();
    $('#trNav a:first').addClass('active');
    $('#trNav a').bind('click', function(){
    
        $('#trNav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#tr_data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
        return false;
    });

});




// customers pagination
$(document).ready(function(){
    $('#cu_data').after('<div id="cuNav"></div>');
    var rowsShown = 15;
    var rowsTotal = $('#cu_data tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#cuNav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#cu_data tbody tr').hide();
    $('#cu_data tbody tr').slice(0, rowsShown).show();
    $('#cuNav a:first').addClass('active');
    $('#cuNav a').bind('click', function(){
    
        $('#cu_data a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#cu_data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
        return false;
    });

});




// dashboard orders pagination
$(document).ready(function(){
    $('#dor_data').after('<div id="dorNav"></div>');
    var rowsShown = 4;
    var rowsTotal = $('#dor_data tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#dorNav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#dor_data tbody tr').hide();
    $('#dor_data tbody tr').slice(0, rowsShown).show();
    $('#dorNav a:first').addClass('active');
    $('#dorNav a').bind('click', function(){
    
        $('#dor_data a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#dor_data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
        return false;
    });
});












