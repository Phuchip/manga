<main class="main">
	<div class="container-fuild manga-read">
		<h1 class="container title-manga-read">
			<a href="<?php echo base_url().$query->alias.'-'.$query->mid ?>"><?php echo $query->name_manga ?></a>
			<span>Chapter <?php echo $chapter ?></span>
		</h1>
		<i>[Cập nhật lúc: <?= timeFormat($query->create_time) ?>]</i>
		<i>Vì đây là crawl từ website khác nên 1 vài chap không có ảnh do website kia khóa, nên chọn từ những chap đâu tiên sẽ có ảnh và website kia khá là chuối</i>
		<div class="fb-share-like-area">
			<div id="fb-root"></div>
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="URurCidC"></script>
			<div class="fb-like" data-href="<?php echo base_url().$query->alias.'-'.$query->mid ?>" data-width="150px" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
		</div>
		<div class="alert alert-info">
			<i class="fa fa-info-circle">
				<em>Sử dụng mũi tên trái (←) hoặc phải (→) để chuyển chapter</em>
			</i>
		</div>
		<div id="navbar" class="navbar-chap">
			<a href="<?php echo base_url() ?>" class="home">
				<i class="fa fa-home"></i>
			</a>
			<a href="<?php echo base_url().$query->alias.'-'.$query->mid ?>" class="home backward">
				<i class="fa fa-list"></i>
			</a>
			<a href="<?= ($prev == false)?'javascript:void(0)':$prev ?>" class="prev a_prev <?= ($prev == false)?'disabled':'' ?>">
				<i class="fa fa-arrow-left"></i>
			</a>
			<select class="select-chapter">
				<?php foreach ($chap->result() as $key => $value): ?>
					<option <?php if ($chapter == $value->chapter) {
						echo 'selected="selected"';
					} ?> value="<?php echo base_url().$value->alias.'/chap-'.$value->chapter.'-'.$value->id.'.html' ?>">Chap <?php echo $value->chapter ?></option>
				<?php endforeach ?>
			</select>
			<a href="<?= ($next == false)?'javascript:void(0)':$next ?>" class="next a_next <?= ($next == false)?'disabled':'' ?>">
				<i class="fa fa-arrow-right"></i>
			</a>
			<a class="follow-link btn-success" href="javascript:void(0)">
				<i class="fa fa-heart"></i> 
				<span>Theo dõi</span>
			</a>
		</div>
		<div class="area-show-content">
		  	<div class="comicDetails" id="show-content">
		  		<?php 
			  		$url = $crawl;
					require_once APPPATH.'libraries/simple_html_dom.php';
			        $html = file_get_html($url);
			        foreach ($html->find('.chapter-content img') as $element) {
			        	echo "<img class='lazyload' src='/images/icon/loading.gif' data-src='".$element->src."'>";
			        }
		  		 ?>
		  	</div>
		</div>
		<div class="manga-bottom">
			<div class="chapter-bottom">
				<a href="<?= ($prev == false)?'javascript:void(0)':$prev ?>" class="btn btn-danger prev <?= ($prev == false)?'disabled':'' ?>">
					<em class="fa fa-chevron-left"></em> Chap trước
				</a>
				<a href="<?= ($next == false)?'javascript:void(0)':$next ?>" class="btn btn-danger next <?= ($next == false)?'disabled':'' ?>">
					Chap sau <em class="fa fa-chevron-right"></em>
				</a>
			</div>
		</div>
		<div class="container comment-area">
			<div class="comment-area">
					<div class="tab-comment-area commnet-active">
						<ul class="ul-comment">
							<li class="tab-comment commnet-active">
								<i class="fa fa-commenting-o" aria-hidden="true"></i>
								<h3>Bình luận</h3>
							</li>
							<li class="tab-comment" data-id="comment-facebook">
								<i class="fa fa-facebook-official" aria-hidden="true"></i>
								<h3>Bình luận Facebook</h3>
							</li>
						</ul>
					</div>
					<div class="load-comment-content" style="display: block;">
						<div class="body-comment-area">
							<div class="image-body-comment-area">
								<?php if (isset($_SESSION['username'])) { ?>
								<img src="<?php echo base_url() ?>image/avatar/<?php echo $_SESSION['image'] ?>">
								<?php } else { ?>
								<img src="<?php echo base_url() ?>image/avatar/no-user.png">
								<?php } ?>
							</div>
							<div class="content-body-comment-area">
								<form>
									<div class="form-group">
										<textarea name="comment_content" id="comment_content" cols="30" rows="10" class="form-control" placeholder="Nhập nội dung vào đây ..."></textarea>
									</div>
									<div class="form-group">
										<button type="submit" class="btn-more btn-submit-comment"> Gửi</button>
									</div>
								</form>
							</div>
						</div>
						<div class="content-comment">
							<div class="sort-content-comment">
								<span class="sort-text-content-comment">Sắp xếp</span>
								<select class="select-sort-text-content-comment">
									<option value="hot">Hot nhất</option>
									<option value="newest" selected="">Mới nhất</option>
									<option value="old">Cũ hơn</option>
								</select>
							</div>
							<ul class="ul-content-comment">
								<li>
									<div class="image-li-content-commnet">
										<img src="<?php echo base_url() ?>image/avatar/avatar.jpg">
										<span class="role-user-comment bg-user-type-1">Thành viên</span>
									</div>
									<div class="content-li-content-commnet">
										<div class="three-dots-comments">
											<span>...</span>
											<div class="action-three-dots-comments" style="display: none;">
												<p data-type="report" data-id="6144c4736dc8073338282053">Báo cáo</p>
											</div>
										</div>
										<div class="h3-span-content-li-content-commnet">
											<h3>Phúc Híp</h3>
											<span class="chapter-comment">Chapter 47</span>
											<span>2021/09/17 23:38</span>
										</div>
										<span class="summary-content-li-content-commnet">
											Thử chức năng bình luận🤣
										</span>
										<a href="javascript:;" id="reply">Trả lời</a>
									</div>
									<div class="replyComment" id="replyCommentID6144c4736dc8073338282053"></div>
								</li>
								<li>
									<div class="image-li-content-commnet">
										<img src="<?php echo base_url() ?>image/avatar/avatar.jpg">
										<span class="role-user-comment bg-user-type-1">Thành viên</span>
									</div>
									<div class="content-li-content-commnet">
										<div class="three-dots-comments">
											<span>...</span>
											<div class="action-three-dots-comments" style="display: none;">
												<p data-type="report" data-id="6144c4736dc8073338282053">Báo cáo</p>
											</div>
										</div>
										<div class="h3-span-content-li-content-commnet">
											<h3>Chu Huyền </h3>
											<span class="chapter-comment">Chapter 47</span>
											<span>2021/09/17 23:38</span>
										</div>
										<span class="summary-content-li-content-commnet">
											Test thử bình luận🤣
										</span>
										<a href="javascript:;" id="reply">Trả lời</a>
									</div>
									<div class="replyComment" id="replyCommentID6144c4736dc8073338282053"></div>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
		</div>
	</div>
</main>
<script src="<?php echo base_url() ?>js/navbar.js"></script>
<script type="text/javascript">
	$("select").click(function() {
	  	var open = $(this).data("isopen");
	  	if(open) {
	    	window.location.href = $(this).val()
	  	}
	  	$(this).data("isopen", !open);
	});
	
	document.onkeydown = checkKey;

	function checkKey(e) {

	    e = e || window.event;
	    var value;

	    if (e.keyCode == '37') {
	       value = $('.a_prev').attr('href');
	       window.location.href = value;
	    }
	    else if (e.keyCode == '39') {
	       value = $('.a_next').attr('href');
	       window.location.href = value;
	    }

	}
</script>