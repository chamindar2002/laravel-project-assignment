 $(document).ready(function() {
 $('.delete_form').submit(function() {
        return confirm("Are you sure you want to delete this record?");
        
    });
 });
    
 function addParam(url, param, value) {
   var a = document.createElement('a'), regex = /[?&]([^=]+)=([^&]*)/g;
   var match, str = []; a.href = url; value=value||"";
   while (match = regex.exec(a.search))
       if (encodeURIComponent(param) != match[1]) str.push(match[1] + "=" + match[2]);
   str.push(encodeURIComponent(param) + "=" + encodeURIComponent(value));
   a.search = (a.search.substring(0,1) == "?" ? "" : "?") + str.join("&");
   //return a.href;
   window.location.href = a.href;
}


   $(".feed-type").change(function(){
        var selected_feed_type = $(".feed-type option:selected").val();
        console.log(selected_feed_type);
        //var url = '<?php echo Request::path() ?>';
        
        if(selected_feed_type !== ''){
            window.location.replace(url+'/'+selected_feed_type);
        }
        
   });