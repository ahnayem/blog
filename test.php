					
					<?php include 'app/view-comment.php'; ?>

					<div class="comments-area">
						<h4 class="text-white"><?php echo $total_comment; ?>Comment<?php if ($total_comment>1){echo 's';}?></h4>

							<?php 
							$Pid = $_GET['id'];

							$query = "SELECT * FROM blog_comment WHERE post_id='$Pid' ORDER BY id DESC";
							$stmt 	  = $db->prepare($query);
							$result   = $stmt->execute();

							while ($row = $stmt->fetch()) { ?>
						<div class="comment-list">
							<div class="single-comment justify-content-between d-flex">
								<div class="user justify-content-between d-flex">
									<div class="thumb">
										<img src="img/blog/c1.jpg" alt="">
									</div>
									<div class="desc">
										<h5><a href="#"><?php echo $row['author_name']; ?></a></h5>
										<p class="date"><?php echo date('jS M, Y', strtotime($row['date']));?></p>
										<p class="comment"><?php echo $row['comment'];?></p>
									</div>
								</div>
								<div class="reply-btn">
									<button type="button" class="btn" <?php $Cid = $row['id']; ?> data-toggle="modal" data-target="#reply">
									  REPLY
									</button>
								</div>
							</div>
						</div>

							<?php $query_reply = "SELECT * FROM blog_reply WHERE post_id='$Pid' AND comment_id='$Cid' ORDER BY id DESC";

								$stmt_reply 	  = $db->prepare($query_reply);
								$result_reply   = $stmt_reply->execute();

								while ($row_reply = $stmt_reply->fetch()) { ?>

						<div class="comment-list left-padding">
							<div class="single-comment justify-content-between d-flex">
								<div class="user justify-content-between d-flex">
									<div class="thumb">
										<img src="img/blog/c2.jpg" alt="">
									</div>
									<div class="desc">
										<h5><a href="#"><?php echo $row_reply['author_name'];?></a></h5>
										<p class="date"><?php echo date('jS M, Y g:i a', strtotime($row_reply['date_reply']));?></p>
										<p class="comment"><?php echo $row_reply['reply'];?></p>
									</div>
								</div>
							</div>
						</div>
						<?php }} ?>
					</div>