function createHTTPRequest()
{
    try
    {
        // try returns a HTTPRequest older versions of Internet Explorer
        return new ActiveXObject('Msxml2.XMLHTTP');
    }
    catch (e) 
    {
        try
        {
            // same thing here
            return new ActiveXObject('Microsoft.XMLHTTP');
        }
        catch (e2) 
        {
            // return current standard HTTPRequest
            return new XMLHttpRequest();
        }
    }
}

function sendHTTPRequest(method, filename, body, callback)
{
    const request = createHTTPRequest();
    
    // set callback
    request.onreadystatechange  = () => {
        if(request.readyState == 4)
        { callback(request); }
    };
    
  //XMLHttpRequest.open(method, url, async)
   request.open(method, filename,  true); 

   //XMLHttpRequest.send(body)
   request.send(body); 
}

function sendGetRequest(filename, success, error = (request) => alert("An unexpected error happened. Please try again."))
{
    const request = createHTTPRequest();
    
    // set callback
    request.onreadystatechange  = () => {
        if(request.readyState == 4)
        { 
            if(request.status == 200)
            { success(request); }
            else
            { error(request); }
        }
    };
    
  //XMLHttpRequest.open(method, url, async)
   request.open("GET", filename,  true); 

   //XMLHttpRequest.send(body)
   request.send(null); 
}

function sendPostRequest(filename, form, success, error = () => alert("An unexpected error happened. Please try again."))
{
    const request = createHTTPRequest();
    
    // set callback
    request.onreadystatechange  = () => {
        if(request.readyState == 4)
        { 
            if(request.status == 200)
            { success(request); }
            else
            { error(request); }
        }
    };
    
  //XMLHttpRequest.open(method, url, async)
   request.open("POST", filename,  true); 

   //XMLHttpRequest.send(body)
   request.send(new FormData(form)); 
}