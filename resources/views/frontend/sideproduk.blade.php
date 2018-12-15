<div class="col-md-4 col-lg-3">
					<div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md">
						<!-- Search -->
						<!-- <div class="search-sidebar2 size12 bo2 pos-relative">
							<input class="input-search-sidebar2 txt10 p-l-20 p-r-55" type="text" name="search" placeholder="Search">
							<button class="btn-search-sidebar2 flex-c-m ti-search trans-0-4"></button>
						</div> -->

						<div class="single-widget search-widget">
       					 <form class="example" action="#" style="margin:auto;max-width:300px">
           				 <input type="text" placeholder="Search Posts" name="search2">
          				  <button type="submit"><i class="fa fa-search"></i></button>
       				 </form>								
   						</div>

						<!-- Categories -->
                        <div class="single-widget category-widget">
                                <h4 class="title">Kategori</h4>
                                <ul>
                            @foreach($kategori as $data)
                            <li><a href="/barang/kategori/{{ $data->slug }}" class="justify-content-between align-items-center d-flex"><h6>{{ $data->nama_kategori }}</h6> <span>({{ $data->Barang->count() }})</span></a></li>
                            @endforeach
							</ul>
                            </div>



						<!-- Most Popular -->
						<div class="popular">
							<h4 class="txt33 p-b-35 p-t-58">
								Recent Post
							</h4>
							@foreach($recent as $data)
           					 <div class="single-recent-post d-flex flex-row">
               				 <div class="recent-thumb">
                    		<img style="max-width:130px;" src="{{asset('/gambar/barang/'.$data->gambar.'')}}" alt="">
                			</div>
               				 <div class="recent-details">
                    <a href="/barang/detail/{{ $data->slug }}">
                    <h10>
                            <b>{{ $data->merk }}</b>
                        </h10>
                        <h10>
                            <b>{{ $data->model }}</b>
                        </h10>
                        
                    </a>
					<p>
                        {{ $data->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>  
            @endforeach
							
						</div>


						<!-- Archive -->
						<!-- <div class="archive">
							<h4 class="txt33 p-b-20 p-t-43">
								Archive
							</h4>

							<ul>
								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										uly 2018
									</a>

									<span class="txt29">
										(9)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										June 2018
									</a>

									<span class="txt29">
										(39)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										May 2018
									</a>

									<span class="txt29">
										(29)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										April  2018
									</a>

									<span class="txt29">
										(35)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										March 2018
									</a>

									<span class="txt29">
										(22)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										February 2018
									</a>

									<span class="txt29">
										(32)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										January 2018
									</a>

									<span class="txt29">
										(21)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										December 2017
									</a>

									<span class="txt29">
										(26)
									</span>
								</li>
							</ul>
						</div> -->

					</div>
				</div>

    </div>