function setOption(inputFieldIdName, event, submitInputFieldIdName, areaVal, undisplayClassName){
    var setVal;
    var inputField, submitInputField;
    
    setVal = event.target;
    inputField = document.getElementById(inputFieldIdName);
    submitInputField = document.getElementById(submitInputFieldIdName);
    
    inputField.innerHTML = setVal.innerHTML;
    submitInputField.value = areaVal;
    
    // undisplay options shown
    doNotDisplayByClass(undisplayClassName);
}

//return 0 if nothing found, 1 if stuffs found, -1 for invalid input
function searchList(fieldIdName, subjectClassName, commentIdName) {
    var inputVal, table, tableRows, subjects, comment;
    var count = 0; //count hit octopaths

    //get input val as the search query
    inputVal = document.getElementById(fieldIdName).innerHTML.toLowerCase();//"search-field"

    //get search subjects from elements with 'search-subject' class
    subjects = document.getElementsByClassName(subjectClassName); //"search-subject"

    //get element for comment
    comment = document.getElementById(commentIdName); //"comment"

    //exception handling
    // var invalidChars = /(^ )/i;
    // if( (result = inputVal.search(invalidChars)) != -1){ comment.innerHTML = "<i>Invalid search query detected: ' " + inputVal[result] + " '</i>"; return -1; }

    //search given query with octopaths on table
    for(var i=0; i<subjects.length; i++) {
        if(inputVal == ''){ //exception if blank input given
            subjects[i].style.display = "none";
            continue;
        }
        
        subjects[i].innerHTML = cleanHtmlElement(subjects[i].innerHTML, "span"); //clean html content to enable search & clean format
        var subjectInnerContent = subjects[i].innerHTML.toLowerCase(); //retrieve html content in each individual subject
        if(subjectInnerContent.search(inputVal) != -1){ //remain the subject displayed and count
            subjects[i].style.display = "";

            //add a tag to the matched part in innerHTML (to highlight it)
            var content = subjects[i].innerHTML;
            var head = subjectInnerContent.indexOf(inputVal);
            var formattedContent = content.slice(0, head) + "<span>" + content.slice(head, head+inputVal.length) + "</span>" + content.slice(head+inputVal.length);
            subjects[i].innerHTML = formattedContent;
            
            count++;
        }
        else{ //hide the subject from the table
            subjects[i].style.display = "none";
        }
    }

    //set/remote comment content depending on the hit octopaths number
    if(count == 0){ comment.innerHTML = "<i>No relevant words found</i>"; return 0; }
    else comment.innerHTML = "";

    return 1;
}

function cleanHtmlElement(content, tag){
    content = content.replace("<"+tag+">", "");
    content = content.replace("</"+tag+">", "");

    return content;
}

function doNotDisplayByClass(subjectClassName){
    var subjects = document.getElementsByClassName(subjectClassName);
    for(var i=0; i<subjects.length; i++){
        subjects[i].style.display = "none";
    }
    // alert('do not display');
}