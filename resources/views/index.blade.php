<!DOCTYPE html
 <html lang="en"> 
 <head> 
     <meta charset="UTF-8"> 
     <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
     <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
     <title>Document</title> 
 </head> 
 <body> 
 <h1>Books</h1> 
 <div> 
     <table border="1"> 
         <tr> 
             <th>Name</th> 
             <th>Publisher</th> 
             <th>Isbn</th> 
             <th>Category</th> 
             <th>Sub_Category</th> 
             <th>Pages</th> 
             <th>Image</th> 
             <th>Added By</th> 

         </tr> 
         @foreach($book as $book ) 
             <tr> 
                 <td>{{$book->name}}</td> 
                 <td>{{$book->publisher}}</td> 
                 <td>{{$book->isbn}}</td> 
                 <td>{{$book->category}}</td> 
                 <td>{{$book->sub_Category}}</td> 
                 <td>{{$book->pages}}</td> 
                 <td>{{$book->image}}</td> 
                 <td>{{$book->added_by}}</td> 
             </tr> 
         @endforeach 
     </table> 
 </div> 
 </body> 
 </html> 


