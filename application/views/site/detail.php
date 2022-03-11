<style type="text/css">
	.replyComment{
		display: none;
	}
</style>
<main class="main">
	<div class="container">
		<div class="row">
			<div class="col-md-8 center-side">
				<div class="top-detail">
					<div class="top-detail-avatar">
						<div class="image-commic-detail">
							<a href="">
								<img class="lazyload" src="<?php echo base_url() ?>images/icon/loading.gif" data-src="<?php echo base_url().$query->image ?>">
							</a>
						</div>
						<div class="add-bookmark-manga">
							<i class="fa fa-bookmark"></i> Theo Dõi
						</div>
						<div class="heart-commic-detail">
							<ul class="area-heart">
								<li class="li-heart li-heart-1 heart-on" data-id="1"></li>
								<li class="li-heart li-heart-2 heart-on" data-id="2"></li>
								<li class="li-heart li-heart-3 heart-on" data-id="3"></li>
								<li class="li-heart li-heart-4 heart-on" data-id="4"></li>
								<li class="li-heart li-heart-5 heart-on" data-id="5"></li>
							</ul>
							<span><?php echo $query->favorite; ?> lượt thích <p>(Hãy bình chọn cho truyện bạn nhé)</p></span>
						</div>
						<div class="manga-status">
							<h5>Tình trạng</h5>
							<p>Đang tiến hành</p>
						</div>
					</div>
					<div class="top-detail-content">
						<h1 class="title-commic-detail"><?php echo $query->name_manga ?></h1>
						<div class="fb-share-like-area">
							<div id="fb-root"></div>
							<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="URurCidC"></script>
							<div class="fb-like" data-href="<?php echo base_url().$query->alias.'-'.$query->id ?>" data-width="150px" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
						</div>
						<div class="save-facebook">
							<div id="fb-root"></div>
							<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="VBrFRDe2"></script>
							<div class="fb-save" data-uri="<?php echo base_url().$query->alias.'-'.$query->id ?>" data-size="large"></div>
						</div>
						<span class="desc-commic-detal">
							<p><?php if ($query->description != ""): ?>
								<?php echo $query->description ?>
							<?php endif ?></p>
						</span>
						<div class="drawer">
							<div class="area-drawer">
								<h5 class="h5-drawer">Tác giả</h5>
								<ul>
									<li><?php echo $query->author ?></li>
									<li>Chu Huyền</li>
								</ul>
							</div>
							<div class="manga-status">
								<h5 class="h5-drawer">Lượt xem </h5>
								<p><?php echo $query->view ?></p>
							</div>
						</div>
						<div class="drawer">
							<div class="area-drawer area-categories">
								<h5 class="h5-drawer">Thể loại</h5>
								<ul class="categories-list-detail-commic">
									<li><?php echo $query->category ?></li>
									<li>Drama</li>
								</ul>
							</div>
						</div>
						<div class="drawer">
							<div class="area-drawer">
								<h5 class="h5-drawer">Nhóm dịch</h5>
								<ul>
									<li>
										<a href="" title=""><?php echo $query->team_translate ?></a>
									</li>
									<li>
										<a href="" title="">PH Company</a>
									</li>
								</ul>
							</div>
							<div class="manga-status">
								<div class="status-commic">
									<h5 class="h5-drawer">Lịch ra mắt</h5>
									<a href=""><?php echo $query->release_date; ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="list-chapter-detail-commic">
					<div class="move-to-chap">
						<div class="a-btn-move">
							<a href="<?= setHref($alias,$first->id,$first->min) ?>" class="btn-move-to-chap">
								<span>Chương đầu</span>
								<span>Chapter 1</span>
							</a>
							<a href="<?= setHref($alias,$last->id,$last->max) ?>" class="btn-move-to-chap">
								<span>Chương mới nhất</span>
								<span>Chapter 50</span>
							</a>
						</div>
					</div>
					<div class="search-chapter">
						<input class="search-input" placeholder="Nhập số chapter hoặc tên để tìm kiếm ... " >
					</div>
					<h2>Danh sách chương</h2>
					<ul class="ul-list-chapter-detail-commic">
						<?php foreach ($chapter->result() as $key => $value): ?>
							<li>
								
							<a href="<?= setHref($value->alias,$value->id,$value->chapter) ?>">
								<h3>Chap <?php echo $value->chapter ?></h3>
							</a>
							<p class="bookmark-chapter add-bookmark ">
								<i class="fa fa-bookmark" aria-hidden="true"></i>
							</p>
							<span class="chapter-view fa fa-eye">&nbsp; <?= $value->view ?></span>
							<span><?= dayFormat($value->create_time) ?></span>
						</li>
						<?php endforeach ?>
					</ul>
				</div>
				<div class="category">
					<div class="row-header-title">
						<h1 class="h1-title-categories">Truyện cùng thể loại</h1>
					</div>
					<div class="content-tab">
						<ul class="clearfix">
							<?php foreach ($category->result() as $key => $value): ?>
								<li class="commic-hover">
									<a href="<?= setHref($value->alias,$value->id) ?>">
										<div class="image-commic-tab">
											<img class="lazyload" src="<?php echo base_url() ?>images/icon/loading.gif" data-src="<?php echo base_url().$value->image ?>">
											<span class="icon-hot"></span>
										</div>
										<span class="time-commic-tab">
											1 tháng trước
											<i class="fa fa-eye" aria-hidden="true"></i>
											17,349&nbsp;
											<i class="fa fa-heart-o" aria-hidden="true"></i>
											10
										</span>
									</a>
									<a href="">
										<h3 class="title-commic-tab"><?= $value->name_manga ?></h3>
									</a>
									<span class="chapter-commic-tab">
										<a href="">Chapter <?= $value->chapter ?></a>
									</span>
									<span class="star-commic-tab star-4"></span>
								</li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
				<div class="comment-area">
					<div class="tab-comment-area comment-active">
						<ul class="ul-comment">
							<li class="tab-comment comment-active">
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
								<img class="lazyload" src="<?php echo base_url() ?>images/icon/loading.gif" data-src="<?php echo $_SESSION['image'] ?>">
								<?php } else { ?>
								<img class="lazyload" src="<?php echo base_url() ?>images/icon/loading.gif" data-src="<?php echo base_url() ?>/image/avatar/no-user.png">
								<?php } ?>
							</div>
							<div class="content-body-comment-area">
								<form method="POST" id="comment_form">
								    <div class="form-group">
								     <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Nhập nội dung vào đây ..." cols="30" rows="10"></textarea>
								    </div>
								    <div class="form-group">
								     <input type="hidden" name="comment_id" id="comment_id" value="<?php echo $id_manga ?>" />
								     <input type="hidden" name="parent_id" id="parent_id" value="0">
								     <input type="submit" name="submit" id="submit" class="btn-more btn-submit-comment" value="Gửi" />
								     <span id="comment_message" style="margin-left: 15px"></span>
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
								<div id="display_comment"></div>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 right-side">
				<?php $this->load->view('site/sidebar'); ?>
			</div>
		</div>
	</div>
</main>
<script>
    $(document).ready(function(){
    	$('#comment_form').on('submit', function(event){
    		event.preventDefault();
    		var form_data = $(this).serialize();
			if(!$('#comment_content').val()){
				alert('Vui lòng thêm bình luận');
				$('#comment_content').focus();
				return false;
			}
    		$.ajax({
    			url:"<?php echo base_url() ?>Site/add_comment_manga",
    			method:"POST",
    			data:form_data,
    			dataType:"JSON",
    			success:function(data)
    			{
    				if(data.error != '')
    				{
    					$('#comment_form')[0].reset();
    					$('#comment_message').html(data.error);
    					$('#parent_id').val('0');
    					load_comment();
    				}
    			}
    		})
    	});

		load_comment();
		function load_comment()
		{
			var id_manga = <?php echo $id_manga ?>;
			$.ajax({
				url:"<?php echo base_url() ?>Site/fetch_comment",
				method:"POST",
				data : {id_manga:id_manga},
				success:function(data)
				{
					$('#display_comment').html(data);
				}
			})
		}
		$(document).on('click', '.reply', function(){
			var comment_id = $(this).attr("id");
			$('#parent_id').val(comment_id);
				$('#comment_content').focus();
		});
	});
</script>