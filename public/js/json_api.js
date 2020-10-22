function jsonApi (){
    $('document').ready( function(){

        dT();
            // $('#api_table').dataTable( {
            //     "ajax"    :'https://jsonplaceholder.typicode.com/posts',
            //     "type"      : 'GET',
            //     "dataType"  : 'json',
            //     success: function(data){
            //     }
            // });

    //   $.ajax({
    //         url:"https://jsonplaceholder.typicode.com/posts",
    //         type: "GET",
    //         dataType: "json",
    //         success: function(data){
    //         //     data.forEach(function(dt){
    //         //         $('#api_table').append("<tr>" +
    //         //             "<td>"+dt.id+"</td>"+
    //         //             "<td>"+dt.userId+"</td>"+
    //         //             "<td>"+dt.title+"</td>"+
    //         //             "<td>"+dt.body+"</td>"+
    //         //         "</tr>"
    //         //     );
    //         // });
    //         }
    //     });
    });
    
    function dT(){
        $(document).ready(function() {
            $('#api_table').DataTable({
                ajax:{
                    url:"https://jsonplaceholder.typicode.com/posts",
                    dataSrc:""
                },
                columns: [
                    { data: 'id'},
                    { data: 'userId'}, 
                    { data: 'title'},
                    { data: 'body'}
                ],
                "search": {
                  "caseInsensitive": false
                }
            });
           
        } );
    }
}

jsonApi();

