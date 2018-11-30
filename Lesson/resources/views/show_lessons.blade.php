@extends("layouts.master")

@section("content")
    <div id="inputForm">
        <form class="form-horizontal" action="#" method="POST" id="saveLesson" name="lessonsForm">
            <div class="inputItems">
            <input class= "form-control" type="hidden" name="lessonId" required>
            </div>
            <div class="inputItems">
                <label>Lesson Name:</label>
                <input class='form-control' type="text" name="lessonName"/>
            </div>
            <div class="inputItems">
                <label>Lesson Description:</label>
                <textarea class='form-control' name="lessonDescription"></textarea>
            </div>
            <div class="inputButtons">
                <button class='btn btn-warning'type="button" onclick="hideInputForm()">Cancel</button>
                <button class='btn btn-primary'type="submit">Save Lesson</button>
            </div>
        </form>
    </div>
    <div id="updateForm">
        <form class='form-horizontal' action="#" method="POST" id="updateForm1" name="upForm">
            @csrf
            <input type='hidden' name='lessonId'>
            <label>Lesson Name:</label>
            <input type="text" name="lessonName">
            <label>Lesson Description:</label>
            <textarea name="lessonDescription"></textarea>
            <button class='btn btn-info' type="submit">Update</button>
            <button class='btn btn-warning'type="button" onclick="hideInputForm()">Cancel</button>
        </form>
    </div>
    <div id= "allLessons"></div>
    <div id = "showUnits"></div>
    <script type ="text/javascript">
        var method = ["POST", "GET"];
        var baseUrl = "http://localhost:8000/"
        function createObject(readyStateFunction, requestMethod, requestUrl,sendData = null)
        {
            var obj = new XMLHttpRequest();
            obj.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                readyStateFunction(this.responseText);
                }
             };
            obj.open(requestMethod, requestUrl, true);
            if(requestMethod == 'POST'){
                obj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                obj.setRequestHeader("X-CSRF-Token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                obj.send(sendData);
            }
            else{
                obj.send();
            }
        }
        function displayLessons(jsonResponse)
        {
            var responseObj = JSON.parse(jsonResponse);
            var tData, count = 0;
            var tableData ="<button class='btn btn-primary' type='button' onclick='showInputForm()'> Add Lesson</button><table class='table table-bordered table-striped table-condensed'><tr><th>#</th><th>Name</th><th>Description</th><th colspan='4'>Action</th></tr>"
            for(tData in responseObj){
                count++;
                tableData +="<tr><td>" + count +"</td>";
                tableData +="<td>" + responseObj[tData].name +"</td>";
                tableData +="<td>" + responseObj[tData].description +"</td>";
                tableData +="<td><a class='btn btn-info' href='#'onclick='showLesson("+responseObj[tData].id +")'>View</a></td>";
                tableData +="<td><a class='btn btn-success' href='#'onclick='editLesson("+responseObj[tData].id +",\""+responseObj[tData].name+"\",\" "+ responseObj[tData].description +"\")'>Edit</a></td>";
                tableData +="<td><a class='btn btn-danger' href='#'onclick='deleteLesson("+responseObj[tData].id +",\""+responseObj[tData].name+"\")'>Delete</a></td>";
                tableData +="<td><a class='btn btn-danger' href='#'onclick='viewUnits("+responseObj[tData].id +")'>Units</a></td></tr>";
            }
                tableData +="</table>"
                document.getElementById("allLessons").innerHTML = tableData;
        }
        function getLessons()
        {
            createObject(displayLessons, method[1], baseUrl + "getLesson");
            document.getElementById("allLessons").style.display="block"; 
            document.getElementById("inputForm").style.display="none";
            document.getElementById("updateForm").style.display="none";
            
        }
        function submitLesson(e)
        {
            e.preventDefault();
            //get values submitted
            var lessonName = document.forms["lessonsForm"]["lessonName"].value;
            var lessonDescription = document.forms["lessonsForm"]["lessonDescription"].value;
            //alert(lessonName);
                //validate values
            if((lessonName !="") && (lessonDescription !=""))
            {
                var sendData = "name="+lessonName+"&description="+lessonDescription;
                createObject(getLessons, method[0], baseUrl + "saveLesson", sendData);
                console.log(JSON.stringify(sendData));
            }
            else{
                alert("invalid input");
            }
        }
        function displaySingleLesson(jsonResponse)
        {
            var responseObj = JSON.parse(jsonResponse);
            var tData, count = 0;
            var tableData ="<table class='table'><tr><th>Name</th><th>Description</th></tr>";
            tableData +="<tr><td>" + responseObj.name +"</td>";
            tableData +="<td>" + responseObj.description +"</td></tr>";
            tableData +="<button class='btn btn-warning'type='button' onclick='getLessons()'>Back</button>";
            document.getElementById("allLessons").innerHTML = tableData;
         tableData +="</table>"
        }
        function showInputForm(){
            document.getElementById("inputForm").style.display="block";
            document.getElementById("allLessons").style.display="none";
        }
        function hideInputForm(){
            document.getElementById("inputForm").style.display="none";
            document.getElementById("allLessons").style.display="block";
            document.getElementById("updateForm").style.display="none";
        }
        function displayEditLesson(){
            document.getElementById("allLessons").style.display="none";
            document.getElementById("updateForm").style.display="block";
        }
        function showLesson(id){
            createObject(displaySingleLesson, method[1], baseUrl + "getSingleLesson/" + id);
        }
        function editLesson(id, name, description){
            displayEditLesson();
            document.forms["upForm"]["lessonId"].value =id;
            document.forms["upForm"]["lessonName"].value =name;
            document.forms["upForm"]["lessonDescription"].value =description;
        }
        // function updateLesson1(id, name, description)
        // {
        //     document.getElementById("updateForm").style.display="block";
        //     document.getElementById("allLessons").style.display="none";
        //     //get updatelesson
        //     document.forms["upForm"]["lessonName"].value = name;
        //     document.forms["upForm"]["lessonDescription"].value = description;
        //     document.forms["upForm"]["lessonId"].value = id;
        // }

        function updateLesson(e){
            e.preventDefault();
            var lessonName = document.forms["upForm"]["lessonName"].value;
            var lessonDescription = document.forms["upForm"]["lessonDescription"].value;
            var lessonId = document.forms["upForm"]["lessonId"].value;
            var sendData = "name="+lessonName+"&description="+lessonDescription+"&id="+lessonId;
            console.log(sendData);
            createObject(getLessons, method[0], baseUrl + "updateLesson", sendData);
        }
        function deleteLesson(id, name){
            var txt;
            if (confirm("Are you sure you want to delete" +" "+name +"?")) {
            txt = "You pressed OK!";
            createObject(getLessons, method[1], baseUrl + "deleteLesson/" + id)
            alert("you have deleted"+name);
             }
            else {
                txt = "You pressed Cancel!";
            } 
        }
        function viewLessonUnits(jsonResponse){
            var responseObj = JSON.parse(jsonResponse);
            var tData, count = 0;
            count++;
            var tableData ="<button class='btn btn-primary' type='button' onclick='showInputForm()'> Add Lesson</button><table class='table table-bordered table-striped table-condensed'><tr><th>#</th><th>Name</th><th>Description</th><th colspan='4'>Action</th></tr>"
            for(tData in responseObj){
                tableData +="<tr><td>" + count +"</td>";
                tableData +="<td>" + responseObj[tData].units_name +"</td>";
                tableData +="<td>" + responseObj[tData].units_duration +"</td>";
                tableData +="<td><a class='btn btn-info' href='#'onclick='viewLecturer("+responseObj[tData].units_id +")'>View Lecturer</a></td>";
                tableData +="<td><a class='btn btn-success' href='#'onclick='editLesson("+responseObj[tData].id +",\""+responseObj[tData].name+"\",\" "+ responseObj[tData].description +"\")'>Edit</a></td>";
                tableData +="<td><a class='btn btn-danger' href='#'onclick='deleteLesson("+responseObj[tData].id +",\""+responseObj[tData].name+"\")'>Delete</a></td>";
                tableData +="<td><a class='btn btn-danger' href='#'onclick='viewUnits("+responseObj[tData].id +")'>Units</a></td></tr>";
            }
                tableData +="</table>"
                document.getElementById("allLessons").innerHTML = tableData;
        }
        function viewUnits(lesson_id){
            createObject(viewLessonUnits, method[1], baseUrl + "getUnits/" + lesson_id);

        }
        function showLecturer(jsonResponse){
            var responseObj = JSON.parse(jsonResponse);
            var tData, count = 0;
            count++;
            var tableData ="<button class='btn btn-primary' type='button' onclick='showInputForm()'> Add Unit/button><table class='table table-bordered table-striped table-condensed'><tr><th>#</th><th>Name</th><th>Description</th><th colspan='4'>Action</th></tr>"
            for(tData in responseObj){
                tableData +="<tr><td>" + count +"</td>";
                tableData +="<td>" + responseObj.lecturer_name +"</td>";
                tableData +="<td>" + responseObj.lecturer_telephone +"</td>";
                tableData +="<td><a class='btn btn-info' href='#'onclick='viewLecturer("+responseObj.units_id +")'>View Lecturer</a></td>";
                //tableData +="<td><a class='btn btn-success' href='#'onclick='editLesson("+responseObj[tData].id +",\""+responseObj[tData].name+"\",\" "+ responseObj[tData].description +"\")'>Edit</a></td>";
                //tableData +="<td><a class='btn btn-danger' href='#'onclick='deleteLesson("+responseObj[tData].id +",\""+responseObj[tData].name+"\")'>Delete</a></td>";
                // tableData +="<td><a class='btn btn-danger' href='#'onclick='viewUnits("+responseObj[tData].id +")'>Units</a></td></tr>";
            }
                tableData +="</table>"
                document.getElementById("allLessons").innerHTML = tableData;
        }
        function viewLecturer(units_id){
            createObject(showLecturer, method[1], baseUrl + "showLecturer/" + units_id); 
        }
        document.getElementById("saveLesson").addEventListener("submit", submitLesson);
        document.getElementById("updateForm1").addEventListener("submit", updateLesson);
    </script>

@endsection