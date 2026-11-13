<?php

// Heading
$_['heading_title']						 = 'Reward Points v.2.6';

// Text
$_['text_extension']					 = 'Modules';
$_['text_success']						 = 'Settings have been changed';
$_['text_edit']							 = 'Edit';
$_['text_copy']							 = 'Link copied!';
$_['text_ocstore']						 = 'OcStore';
$_['text_opencart']						 = 'Opencart';

$_['text_cron']							 = 'CRON';
$_['text_action_reward']				 = 'Activity Rewards';
$_['text_source']						 = 'Bonus reward calculation settings';
$_['text_setting_category']				 = 'Category Settings';
$_['text_setting_manufacturer']			 = 'Manufacturer Settings';

$_['text_add_success']					 = 'Reward points successfully added';
$_['text_remove_success']				 = 'Reward points successfully removed';

$_['text_add_for_review']				 = 'Reward points for review: %s';
$_['text_remove_for_review']			 = 'Reward points removed for review: %s';

$_['text_add_for_order']				 = 'Reward points for order: %s';
$_['text_remove_for_order']				 = 'Reward points removed for order: %s';

$_['text_mail_template_register']		 = 'Registration reward mail template';
$_['text_mail_template_newsletter']		 = 'Newsletter reward mail template';
$_['text_mail_template_review']			 = 'Review reward mail template';
$_['text_mail_template_order']			 = 'Order reward mail template';
$_['text_mail_template_warning']		 = 'Warning mail template';
$_['text_mail_template_remove']			 = 'Removal mail template';

$_['text_reward_expired']				 = 'Expired reward points (expired)';
$_['text_reward_summary']				 = 'Reward points for order: %s, removed reward points for order: %s, removed reward points (expired): %s, messages sent: %s.';
$_['text_standard']						 = 'Standard for Opencart';
$_['text_cart']							 = 'Reward for Cart';
$_['text_refresh']						 = 'The module can work in two modes and has a different set of settings:<ol><li><b>Standard for Opencart</b> - in this mode, reward points are taken from the database tables. That is, without violating the standard functionality of Opencart, but only helps to automate the process.</li><li><b>Reward for Cart</b> - in this mode, the number of reward points accrued is taken from the amount of goods in the cart.</li><p>Before setting up the module, select the appropriate method in <b>Method of calculating reward points</b> and save the settings. After that, you will be able to configure all the fields of the module.</p>';
$_['text_limit']						 = 'Limits';

// Entry
$_['entry_status']						 = 'Status';
$_['entry_cron']						 = 'CRON Status';
$_['entry_cron_key']					 = 'CRON Key';
$_['entry_cron_url']					 = 'CRON URLs';
$_['entry_date_enable']					 = 'Enable date';
$_['entry_calculation_source']			 = 'Bonus reward calculation source';
$_['entry_category']					 = 'Categories';
$_['entry_category_method']				 = 'Category handling method';
$_['entry_manufacturer']				 = 'Manufacturers';
$_['entry_customer_group']				 = 'Customer groups';
$_['entry_register']					 = 'Registration rewards';
$_['entry_comment']						 = 'Comment rewards';
$_['entry_newsletter']					 = 'Newsletter rewards';
$_['entry_day']							 = 'days';
$_['entry_for_day']						 = 'for';
$_['entry_day_start']					 = 'Day of reward assignment';
$_['entry_day_end']						 = 'Day of reward deduction';
$_['entry_limit']						 = 'Limit';
$_['entry_product']						 = 'products';
$_['entry_subject']						 = 'Subject';
$_['entry_message']						 = 'Message';
$_['entry_day_warning']					 = 'Warning day';
$_['entry_special_status']				 = 'Rewards for promotional products';
$_['entry_option_status']				 = 'Rewards for product options';
$_['entry_reward_price']				 = 'Price in reward points';
$_['entry_customer_price']				 = 'Reward points for customers';
$_['entry_method']						 = 'Method of calculating reward points';
$_['entry_cart_percent']				 = 'Maximum used reward points in cart';
$_['entry_special_limit']				 = 'Use the price of the special price product when calculating the maximum number of bonus points used in an order';
$_['entry_reward_if_special']			 = 'Allow reward points accrual if products with special prices';
$_['entry_coupon_limit']				 = 'Allow the use reward points if coupon is used in the cart';
$_['entry_reward_if_coupon']			 = 'Allow reward points accrual if coupon is applied in the cart';
$_['entry_voucher_limit']				 = 'Allow the use reward points if voucher is used in the cart';
$_['entry_reward_if_voucher']			 = 'Allow reward points accrual if voucher is applied in the cart';
$_['entry_points_limit']				 = 'Accrue reward points to the user for the cart if he used reward points';
$_['entry_min_cart_price']				 = 'Minimum order cart value for using reward points';
$_['entry_max_cart_price']				 = 'Maximum order cart value for using reward points';

// Button
$_['button_add_reward_to_customer']		 = 'Add reward points to customers';
$_['button_add_reward_to_product']		 = 'Add reward points to products';
$_['button_remove_reward_to_product']	 = 'Remove reward points from all products';

// Column
$_['column_category']					 = 'Category';
$_['column_manufacturer']				 = 'Manufacturer';
$_['column_coefficient']				 = 'Coefficient';

// Error
$_['error_permission']					 = 'You do not have permission to modify';
$_['error_status']						 = 'Enable the module';
$_['error_category']					 = 'Add categories';
$_['error_manufacturer']				 = 'Add manufacturers';
	
// Help	
$_['help_category']						 = 'Select product categories for which the reward points system will apply. You can limit the module to specific categories to avoid affecting the entire catalog.';
$_['help_manufacturer']					 = 'Select product manufacturers for which the reward points system will apply. You can limit the module to specific manufacturers to avoid affecting the entire catalog.';
$_['help_calculation_source']			 = 'Select whether the bonus calculation for a product should be based on its category or manufacturer.';
$_['help_category_method']				 = 'Which criteria to use to select the product. OcStore - considers only the main category for rewards. Opencart - uses the last category in the processing queue if a product is in multiple categories.';
$_['help_register']						 = 'Settings for reward points upon registering a new user. This helps encourage new users to register on the site.';
$_['help_comment']						 = 'Settings for reward points for leaving comments or reviews on products. This encourages users to engage more by providing feedback on products.';
$_['help_newsletter']					 = 'Settings for reward points for subscribing to site news or newsletters. This helps boost user engagement and encourages them to return for new offers and promotions.';
$_['help_day_start']					 = 'Specify the day after the order when the reward points will be credited. The countdown starts after the order is marked as complete.';
$_['help_day_end']						 = 'Specify the day when the reward points will be deducted. The countdown starts after the reward points are credited.';
$_['help_limit']						 = 'Specify the maximum number of products to process per cycle. This limit helps avoid overloading the system if there are a large number of products.';
$_['help_coefficient']					 = 'The coefficient that determines the value of the product in reward points. For example, if the coefficient is set to 1, then for every 100 currency units spent, 100 reward points will be credited.';
$_['help_customer_group']				 = 'Set in percentage (as a number without additional signs), determining how many reward points the customer group will earn for an order. For example, if the product costs 5000 currency units and 10 is set, the customer will earn 10% (500 reward points).';
$_['help_day_warning']					 = 'How many days before automatic deduction should a warning email be sent to the user.';
$_['help_message']						 = 'Supported variables: {firstname} - first name, {lastname} - last name, {points} - number of credited reward points.';
$_['help_special_status']				 = 'Rewards for promotional products. If disabled, the reward points for promotional products are set to 0. Reward points are not credited. Only works with active promotions on the product.';
$_['help_option_status']				 = 'Rewards for product options. If disabled, the reward points for product options are set to 0. Reward points are not credited. Only works with active option on the product.';
$_['help_date_enable']					 = 'Specify the starting point date for crediting/deducting reward points. If set to 0000-00-00, reward points will be credited/deducted for all orders.';

$_['help_method']						 = 'If Standard for Opencart is selected, reward points will be taken from the oc_product table. If Reward for Cart is selected, reward points will be taken from the order basket, i.e. the price of the product in the basket will be recalculated.';
$_['help_cart_percent']					 = 'Specified as a number. Defines the maximum reward points amount that can be used in cart.';
