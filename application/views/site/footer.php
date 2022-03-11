<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4 copyright">
				<a href="">
					<img src="<?php echo base_url() ?>image/overlord.png">
				</a>
				<div class="mrt10">
					<!-- <div id="fb-root"></div>
					<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="LypV1NYD"></script>
					<div class="fb-page" data-href="https://www.facebook.com/Book-Store-BA-102752331740879" data-tabs="timeline" data-width="340" data-height="70" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Book-Store-BA-102752331740879" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Book-Store-BA-102752331740879">Book Store BA</a></blockquote></div> -->
				</div>
				<p>Copy Right © 2021 OverLord</p>
			</div>
			<div class="col-md-8">
				<div class="link-footer">
					<h4>Thể loại</h4>
					<ul>
						<li>
							<a href="">Chuyển sinh</a>
						</li>
						<li>
							<a href="">Hành động</a>
						</li>
						<li>
							<a href="">Võ thuật</a>
						</li>
						<li>
							<a href="">Pháp thuật</a>
						</li>
						<li>
							<a href="">Manhwa</a>
						</li>
						<li>
							<a href="">Manhua</a>
						</li>
					</ul>
					<a class="btn-top" href="javascript:void(0);" title="Top" style="display: inline;">
						<i class="fa fa-angle-up"></i>
					</a>
				</div>
				<div class="description">
					<b>OverLord Manga </b>- Kho truyện tranh online miễn phí | Truyện Hay. Truyện Mới. Website luôn cập nhập những bộ truyện mới nhất thuộc các thể loại đặc sắc như truyện tiên hiệp, kiếm hiệp, truyện teen, tiểu thuyết ngôn tình hay nhất. Hỗ trợ mọi thiết bị di động và máy tính bảng ...
				</div>
			</div>
		</div>
	</div>
</footer>
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
      		<div class="modal-header border-bottom-0">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
      		</div>
	      	<div class="modal-body">
	      		<div class="login">
			        <div class="form-title text-center">
			          <h4>Đăng nhập</h4>
			        </div>
		        	<div class="d-flex flex-column text-center">
			          	<form class="login-register">
			          		<div id="responseDiv" class="alert text-center" style="display: none;">
			          			<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
								<span id="message" style="font-size: 13px;"></span>
							</div>
			              	<input type="email" class="form-control" id="email-login" placeholder="Nhập địa chỉ email...">
			              	<input type="password" class="form-control" id="password-login" placeholder="Nhập mật khẩu...">
				            <button type="button" id="login-submit" class="btn btn-info btn-round">Đăng nhập</button>
				            <img class="loader-login" src="<?php echo base_url() ?>images/icon/loading.gif">
			          	</form>
			          	<div class="text-center text-muted delimiter"><i>Hoặc</i></div>
			          	<div class="d-flex justify-content-center social-buttons">
				            <a href="" class="btn-login-social login-twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
				            <a href="" class="btn-login-social login-facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-official"></i></a>
				            <a href="" class="btn-login-social login-google" data-toggle="tooltip" data-placement="top" title="Google"><i class="fa fa-google"></i></a>
			          	</div>
		        	</div>
			      	<div class="modal-footer d-flex justify-content-center">
			        	<div class="signup-section">Bạn chưa có tài khoản ? <a href="javascript:void(0)" class="text-info btn-register"> Đăng ký</a>.</div>
			      	</div>
		      	</div>
		      	<div class="register" style="display: none;">
		      		<div class="form-title text-center">
			          <h4>Đăng ký</h4>
			        </div>
		        	<div class="d-flex flex-column text-center">
			          	<form class="login-register">
			          		<div id="responseDiv2" class="alert text-center" style="display: none;">
			          			<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
								<span id="message2" style="font-size: 13px;"></span>
							</div>
			          		<input type="text" class="form-control" id="username-register" placeholder="Nhập tên tài khoản...">
		              		<input type="email" class="form-control" id="email-register" placeholder="Nhập địa chỉ email...">
			              	<input type="password" class="form-control" id="password-register" placeholder="Nhập mật khẩu...">
			            	<input type="password" class="form-control" id="Re-password-register" placeholder="Nhập lại mật khẩu...">
				            <button type="button" id="register-submit" class="btn btn-info btn-round btn-signup">Đăng ký</button>
				            <img class="loader-register" src="<?php echo base_url() ?>images/icon/loading.gif">
			          	</form>
		        	</div>
			      	<div class="modal-footer d-flex justify-content-center">
			        	<div class="signup-section">Quay lại đăng nhập ? <a href="javascript:void(0)" class="text-info btn-go-back"> Quay lại</a>.</div>
			      	</div>
		      	</div>
	  		</div>
		</div>
	</div>
</div>
