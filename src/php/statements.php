<?php $getParkingList = $pdo->prepare("SELECT parking.id,
                                        parking.address,
                                        parking.price,
                                        parking.is_premium,
                                        parking.max_spots,
                                        parking.spots_taken,
                                        parking.start_time,
                                        parking.end_time,
                                        parking.is_for_disabled,
                                        partner.company_name   
                                        FROM parking 
                                        LEFT JOIN partner 
                                        ON parking.partner_id = partner.id;");
?>
<?php $getSingleParkingData = $pdo->prepare("SELECT parking.id,
                                        parking.address,
                                        parking.price,
                                        parking.is_premium,
                                        parking.max_spots,
                                        parking.spots_taken,
                                        parking.start_time,
                                        parking.end_time,
                                        parking.is_for_disabled,
                                        partner.company_name   
                                        FROM parking 
                                        LEFT JOIN partner 
                                        ON parking.partner_id = partner.id 
                                        WHERE parking.id=:id LIMIT 1");
?>

<?php $getReviewListForParking = $pdo->prepare("SELECT review.id, 
                                        review.title, 
                                        review.description, 
                                        review.rating, 
                                        review.title 
                                        FROM `review` 
                                        WHERE parking_id = :id"); 
?>