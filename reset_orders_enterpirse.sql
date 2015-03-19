SET FOREIGN_KEY_CHECKS=0;

TRUNCATE TABLE `sales_flat_order`;
TRUNCATE TABLE `sales_flat_order_address`;
TRUNCATE TABLE `sales_flat_order_grid`;
TRUNCATE TABLE `sales_flat_order_item`;
TRUNCATE TABLE `sales_flat_order_payment`;
TRUNCATE TABLE `sales_flat_order_status_history`;
TRUNCATE TABLE `sales_flat_quote`;
TRUNCATE TABLE `sales_flat_quote_address`;
TRUNCATE TABLE `sales_flat_quote_address_item`;
TRUNCATE TABLE `sales_flat_quote_item`;
TRUNCATE TABLE `sales_flat_quote_item_option`;
TRUNCATE TABLE `sales_flat_quote_payment`;
TRUNCATE TABLE `sales_flat_quote_shipping_rate`;
TRUNCATE TABLE `sales_flat_shipment`;
TRUNCATE TABLE `sales_flat_shipment_comment`;
TRUNCATE TABLE `sales_flat_shipment_grid`;
TRUNCATE TABLE `sales_flat_shipment_item`;
TRUNCATE TABLE `sales_flat_shipment_track`;
TRUNCATE TABLE `sales_invoiced_aggregated`;
TRUNCATE TABLE `sales_invoiced_aggregated_order`;
TRUNCATE TABLE `sales_order_aggregated_created`;
TRUNCATE TABLE `sales_order_tax`;
TRUNCATE TABLE `sales_refunded_aggregated`;
TRUNCATE TABLE `sales_refunded_aggregated_order`;
TRUNCATE TABLE `sales_shipping_aggregated`;
TRUNCATE TABLE `sales_shipping_aggregated_order`;
TRUNCATE TABLE `sales_flat_invoice`;
TRUNCATE TABLE `sales_flat_invoice_comment`;
TRUNCATE TABLE `sales_flat_invoice_grid`;
TRUNCATE TABLE `sales_flat_invoice_item`;
TRUNCATE TABLE `sales_flat_creditmemo`;
TRUNCATE TABLE `sales_flat_creditmemo_comment`;
TRUNCATE TABLE `sales_flat_creditmemo_grid`;
TRUNCATE TABLE `sales_flat_creditmemo_item`;

TRUNCATE `sales_flat_order`;
TRUNCATE `sales_flat_order_address`;
TRUNCATE `sales_flat_order_grid`;
TRUNCATE `sales_flat_order_item`;
TRUNCATE `sales_flat_order_payment`;
TRUNCATE `sales_flat_order_status_history`;
TRUNCATE `sales_flat_quote`;
TRUNCATE `sales_flat_quote_address`;
TRUNCATE `sales_flat_quote_address_item`;
TRUNCATE `sales_flat_quote_item`;
TRUNCATE `sales_flat_quote_item_option`;
TRUNCATE `sales_flat_quote_payment`;
TRUNCATE `sales_flat_quote_shipping_rate`;
TRUNCATE `sales_flat_shipment`;
TRUNCATE `sales_flat_shipment_comment`;
TRUNCATE `sales_flat_shipment_grid`;
TRUNCATE `sales_flat_shipment_item`;
TRUNCATE `sales_flat_shipment_track`;
TRUNCATE `sales_invoiced_aggregated`;
TRUNCATE `sales_invoiced_aggregated_order`;
TRUNCATE `sales_order_aggregated_created`;
TRUNCATE `sales_order_tax`;
TRUNCATE `sales_refunded_aggregated`;
TRUNCATE `sales_refunded_aggregated_order`;
TRUNCATE `sales_shipping_aggregated`;
TRUNCATE `sales_shipping_aggregated_order`;
TRUNCATE `sales_flat_invoice`;
TRUNCATE `sales_flat_invoice_comment`;
TRUNCATE `sales_flat_invoice_grid`;
TRUNCATE `sales_flat_invoice_item`;
TRUNCATE `sales_flat_creditmemo`;
TRUNCATE `sales_flat_creditmemo_comment`;
TRUNCATE `sales_flat_creditmemo_grid`;
TRUNCATE `sales_flat_creditmemo_item`;



ALTER TABLE `sales_flat_order` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_order_address` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_order_grid` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_order_item` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_order_payment` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_order_status_history` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_quote` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_quote_address` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_quote_address_item` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_quote_item` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_quote_item_option` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_quote_payment` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_quote_shipping_rate` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_shipment` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_shipment_comment` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_shipment_grid` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_shipment_item` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_shipment_track` AUTO_INCREMENT=1;
ALTER TABLE `sales_invoiced_aggregated` AUTO_INCREMENT=1;
ALTER TABLE `sales_invoiced_aggregated_order` AUTO_INCREMENT=1;
ALTER TABLE `sales_order_aggregated_created` AUTO_INCREMENT=1;
ALTER TABLE `sales_order_tax` AUTO_INCREMENT=1;
ALTER TABLE `sales_refunded_aggregated` AUTO_INCREMENT=1;
ALTER TABLE `sales_refunded_aggregated_order` AUTO_INCREMENT=1;
ALTER TABLE `sales_shipping_aggregated` AUTO_INCREMENT=1;
ALTER TABLE `sales_shipping_aggregated_order` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_invoice` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_invoice_comment` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_invoice_grid` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_invoice_item` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_creditmemo` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_creditmemo_comment` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_creditmemo_grid` AUTO_INCREMENT=1;
ALTER TABLE `sales_flat_creditmemo_item` AUTO_INCREMENT=1;

SET FOREIGN_KEY_CHECKS=1; 


SET FOREIGN_KEY_CHECKS=0;

TRUNCATE `customer_address_entity`;
TRUNCATE `customer_address_entity_datetime`;
TRUNCATE `customer_address_entity_decimal`;
TRUNCATE `customer_address_entity_int`;
TRUNCATE `customer_address_entity_text`;
TRUNCATE `customer_address_entity_varchar`;
TRUNCATE `customer_entity`;
TRUNCATE `customer_entity_datetime`;
TRUNCATE `customer_entity_decimal`;
TRUNCATE `customer_entity_int`;
TRUNCATE `customer_entity_text`;
TRUNCATE `customer_entity_varchar`;
TRUNCATE `log_customer`;
TRUNCATE `log_visitor`;
TRUNCATE `log_visitor_info`;
 
ALTER TABLE `customer_address_entity` AUTO_INCREMENT=1;
ALTER TABLE `customer_address_entity_datetime` AUTO_INCREMENT=1;
ALTER TABLE `customer_address_entity_decimal` AUTO_INCREMENT=1;
ALTER TABLE `customer_address_entity_int` AUTO_INCREMENT=1;
ALTER TABLE `customer_address_entity_text` AUTO_INCREMENT=1;
ALTER TABLE `customer_address_entity_varchar` AUTO_INCREMENT=1;
ALTER TABLE `customer_entity` AUTO_INCREMENT=1;
ALTER TABLE `customer_entity_datetime` AUTO_INCREMENT=1;
ALTER TABLE `customer_entity_decimal` AUTO_INCREMENT=1;
ALTER TABLE `customer_entity_int` AUTO_INCREMENT=1;
ALTER TABLE `customer_entity_text` AUTO_INCREMENT=1;
ALTER TABLE `customer_entity_varchar` AUTO_INCREMENT=1;
ALTER TABLE `log_customer` AUTO_INCREMENT=1;
ALTER TABLE `log_visitor` AUTO_INCREMENT=1;
ALTER TABLE `log_visitor_info` AUTO_INCREMENT=1;
 

TRUNCATE `eav_entity_store`;
ALTER TABLE  `eav_entity_store` AUTO_INCREMENT=1;




SET FOREIGN_KEY_CHECKS=1; 