var socket  = require('socket.io');
var express = require('express');
var app     = express();
var server  = require('http').createServer(app);
var io      = socket.listen( server );
var port    = process.env.PORT || 3000;

server.listen(port, function () 
{
    console.log('Server listening at port %d', port);
});


io.on('connection', function (socket) {

/*
socket.on( 'new_count_message', function( data ) {
io.sockets.emit( 'new_count_message', { 
	new_count_message: data.new_count_message

});
});
*/

socket.on( 'updated_count', function( data ) 
{
    io.sockets.emit( 'updated_count', {
        rgctr: data.rgctr,
        ftimer: data.ftimer,
        nodg: data.nodg,
        wdg: data.wdg
    });
});


socket.on( 'new_registered', function( data ) 
{
    io.sockets.emit( 'new_registered', {
        dataArr:data.dataArr
    });
});

socket.on( 'new_registered_dashboard', function( data ) 
{
    io.sockets.emit( 'new_registered_dashboard', {
        dataArr:data.dataArr
    });
});

  
});
