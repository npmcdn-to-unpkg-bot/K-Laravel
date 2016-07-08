<div class="input-group nav navbar-left" id="adv-search">
<form role="form" action="{{ url('tasks') }}" method="POST">
    <input type="text" id="title" name="title" class="form-control" placeholder="What did you do today?" />

    <div class="input-group-btn">
        <div class="btn-group" role="group">
            <div class="dropdown dropdown-lg">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" id="details">Details <span class="caret"></span></button>
<div class="dropdown-menu dropdown-menu-right thewhite" role="menu">

    {!! csrf_field() !!}
    
      
      <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" id="" class="form-control"></textarea>
      </div>
      <div class="form-group">
      <button id="save" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Save</button>
      </div>
    
                   
                </div>
            </div>
        </div>
    </div>  
    </form>      
</div>
	
