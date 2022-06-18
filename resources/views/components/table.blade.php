<div>

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">{{$titleName}}</span> 
    </h4>
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">{{$button}}</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              {{$tableThead}}
            </thead>
              {{$tableTbody}}
          </table>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->
</div>