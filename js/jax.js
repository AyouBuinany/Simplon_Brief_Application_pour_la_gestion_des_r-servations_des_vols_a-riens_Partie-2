$(function(){

    $.get({
        method:"GET",
        url:"data.php",
        success:function(data){
            var result=JSON.parse(data);
            console.log(result);
            $.each(result,function(key,val){
                console.log("key" + key[val]);
                $("#T_table").append($("<tr class='rwd-table tr'>")
                .append($("<td>").append(val[0]))
                .append($("<td>").append(val[1]))
                .append($("<td>").append(val[2]))
                .append($("<td>").append(val[3]))
                .append($("<td>").append(val[4]))
                .append($("<td>").append(val[5]))
                .append($("<td>").append(val[6]))
                .append($("<td>").append(val[7]))
                );
            });
        }
});
});