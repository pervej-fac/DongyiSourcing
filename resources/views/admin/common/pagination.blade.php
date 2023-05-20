<div class="row">
    <div class="col-lg-12 offset-lg-4">
        <div class="row d-flex">
            <div class="col-lg-4 col-4  text-end pe-lg-0">
                <label for="floatingInput" class="mt-2 pe-lg-2 ">
                    Showing {{$data->firstItem() ?? 0}} To {{$data->lastItem() ?? 0}} Of {{$data->total()}} Records
                </label>
            </div>
            <div class="col-lg-5 col-8 pe-lg-0 ps-0 mb-3">
                <nav aria-label="Page navigation example" class="">
                    {{ $data->onEachSide(0)->withQueryString()->links() }}
                </nav>
            </div>
            <div class="col-lg-1 col-2 text-end pe-lg-0 ps-lg-0 ps-4">
                <select name="perpage" id="perpage" class="form-select   bg-white" style="width:65px">
                    <option value="10" {{isset($per_page) && $per_page==10?'selected':''}}>10</option>
                    <option value="25" {{isset($per_page) && $per_page==25?'selected':''}}>25</option>
                    <option value="50" {{isset($per_page) && $per_page==50?'selected':''}}>50</option>
                    <option value="100" {{isset($per_page) && $per_page==100?'selected':''}}>100</option>
                    <option value="250" {{isset($per_page) && $per_page==250?'selected':''}}>250</option>
                    <option value="500" {{isset($per_page) && $per_page==500?'selected':''}}>500</option>
                </select>
            </div>
            <div class="col-lg-1 col-1 text-end ">
                <label for="floatingInput" class="ps-1 me-1 pt-1 ">Goto</label>
            </div>
            <div class="col-lg-1 col-2 text-lg-end  pe-0">
                <input class="form-control bg-white pe-0" type="text" id="goto">
            </div>
        </div>
    </div>
</div>