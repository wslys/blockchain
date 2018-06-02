/*
 Navicat MySQL Data Transfer

 Source Server         : local-MySQL
 Source Server Type    : MySQL
 Source Server Version : 50722
 Source Host           : localhost:3306
 Source Schema         : platform_bi

 Target Server Type    : MySQL
 Target Server Version : 50722
 File Encoding         : 65001

 Date: 02/06/2018 17:57:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for counter_currencys
-- ----------------------------
DROP TABLE IF EXISTS `counter_currencys`;
CREATE TABLE `counter_currencys`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tp_id` int(11) NULL DEFAULT NULL,
  `tag_id` int(11) NULL DEFAULT NULL,
  `bi_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pair` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pair_lable` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `price` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `create_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 288 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of counter_currencys
-- ----------------------------
INSERT INTO `counter_currencys` VALUES (1, 4, 1, 'LTC', 'LTC_BTC', 'BTC', '0.0161074', 1527933002);
INSERT INTO `counter_currencys` VALUES (2, 4, 1, 'DOGE', 'DOGE_BTC', 'BTC', '4.6E-7', 1527933002);
INSERT INTO `counter_currencys` VALUES (3, 4, 1, 'VTC', 'VTC_BTC', 'BTC', '0.00023249', 1527933002);
INSERT INTO `counter_currencys` VALUES (4, 4, 1, 'PPC', 'PPC_BTC', 'BTC', '0.00025202', 1527933002);
INSERT INTO `counter_currencys` VALUES (5, 4, 1, 'FTC', 'FTC_BTC', 'BTC', '1.616E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (6, 4, 1, 'RDD', 'RDD_BTC', 'BTC', '8.3E-7', 1527933002);
INSERT INTO `counter_currencys` VALUES (7, 4, 1, 'NXT', 'NXT_BTC', 'BTC', '1.807E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (8, 4, 1, 'DASH', 'DASH_BTC', 'BTC', '0.04234969', 1527933002);
INSERT INTO `counter_currencys` VALUES (9, 4, 1, 'POT', 'POT_BTC', 'BTC', '1.159E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (10, 4, 1, 'BLK', 'BLK_BTC', 'BTC', '2.727E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (11, 4, 1, 'EMC2', 'EMC2_BTC', 'BTC', '2.487E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (12, 4, 1, 'XMY', 'XMY_BTC', 'BTC', '8.1E-7', 1527933002);
INSERT INTO `counter_currencys` VALUES (13, 4, 1, 'AUR', 'AUR_BTC', 'BTC', '8.132E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (14, 4, 1, 'EFL', 'EFL_BTC', 'BTC', '1.311E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (15, 4, 1, 'GLD', 'GLD_BTC', 'BTC', '2.138E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (16, 4, 1, 'SLR', 'SLR_BTC', 'BTC', '3.549E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (17, 4, 1, 'PTC', 'PTC_BTC', 'BTC', '4.11E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (18, 4, 1, 'GRS', 'GRS_BTC', 'BTC', '0.00013106', 1527933002);
INSERT INTO `counter_currencys` VALUES (19, 4, 1, 'NLG', 'NLG_BTC', 'BTC', '1.14E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (20, 4, 1, 'RBY', 'RBY_BTC', 'BTC', '5.556E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (21, 4, 1, 'XWC', 'XWC_BTC', 'BTC', '1.644E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (22, 4, 1, 'MONA', 'MONA_BTC', 'BTC', '0.00044571', 1527933002);
INSERT INTO `counter_currencys` VALUES (23, 4, 1, 'THC', 'THC_BTC', 'BTC', '8.82E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (24, 4, 1, 'ENRG', 'ENRG_BTC', 'BTC', '8.2E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (25, 4, 1, 'ERC', 'ERC_BTC', 'BTC', '5.769E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (26, 4, 1, 'VRC', 'VRC_BTC', 'BTC', '5.915E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (27, 4, 1, 'CURE', 'CURE_BTC', 'BTC', '3.367E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (28, 4, 1, 'XMR', 'XMR_BTC', 'BTC', '0.02149557', 1527933002);
INSERT INTO `counter_currencys` VALUES (29, 4, 1, 'CLOAK', 'CLOAK_BTC', 'BTC', '0.00110791', 1527933002);
INSERT INTO `counter_currencys` VALUES (30, 4, 1, 'KORE', 'KORE_BTC', 'BTC', '0.0003338', 1527933002);
INSERT INTO `counter_currencys` VALUES (31, 4, 1, 'XDN', 'XDN_BTC', 'BTC', '1.29E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (32, 4, 1, 'TRUST', 'TRUST_BTC', 'BTC', '7.78E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (33, 4, 1, 'NAV', 'NAV_BTC', 'BTC', '0.00012983', 1527933002);
INSERT INTO `counter_currencys` VALUES (34, 4, 1, 'XST', 'XST_BTC', 'BTC', '3.471E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (35, 4, 1, 'VIA', 'VIA_BTC', 'BTC', '0.00021442', 1527933002);
INSERT INTO `counter_currencys` VALUES (36, 4, 1, 'PINK', 'PINK_BTC', 'BTC', '2.41E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (37, 4, 1, 'IOC', 'IOC_BTC', 'BTC', '0.00011619', 1527933002);
INSERT INTO `counter_currencys` VALUES (38, 4, 1, 'CANN', 'CANN_BTC', 'BTC', '4.7E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (39, 4, 1, 'SYS', 'SYS_BTC', 'BTC', '4.638E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (40, 4, 1, 'NEOS', 'NEOS_BTC', 'BTC', '0.00029471', 1527933002);
INSERT INTO `counter_currencys` VALUES (41, 4, 1, 'DGB', 'DGB_BTC', 'BTC', '4.49E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (42, 4, 1, 'BURST', 'BURST_BTC', 'BTC', '3.54E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (43, 4, 1, 'EXCL', 'EXCL_BTC', 'BTC', '0.000102', 1527933002);
INSERT INTO `counter_currencys` VALUES (44, 4, 1, 'SWIFT', 'SWIFT_BTC', 'BTC', '7.354E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (45, 4, 1, 'DOPE', 'DOPE_BTC', 'BTC', '3.82E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (46, 4, 1, 'BLOCK', 'BLOCK_BTC', 'BTC', '0.0033472', 1527933002);
INSERT INTO `counter_currencys` VALUES (47, 4, 1, 'ABY', 'ABY_BTC', 'BTC', '8.2E-7', 1527933002);
INSERT INTO `counter_currencys` VALUES (48, 4, 1, 'BYC', 'BYC_BTC', 'BTC', '7.333E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (49, 4, 1, 'XMG', 'XMG_BTC', 'BTC', '3.278E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (50, 4, 1, 'BLITZ', 'BLITZ_BTC', 'BTC', '', 1527933002);
INSERT INTO `counter_currencys` VALUES (51, 4, 1, 'BAY', 'BAY_BTC', 'BTC', '5.35E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (52, 4, 1, 'SPR', 'SPR_BTC', 'BTC', '4.32E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (53, 4, 1, 'VTR', 'VTR_BTC', 'BTC', '4.657E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (54, 4, 1, 'XRP', 'XRP_BTC', 'BTC', '8.448E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (55, 4, 1, 'GAME', 'GAME_BTC', 'BTC', '', 1527933002);
INSERT INTO `counter_currencys` VALUES (56, 4, 1, 'COVAL', 'COVAL_BTC', 'BTC', '7.9E-7', 1527933002);
INSERT INTO `counter_currencys` VALUES (57, 4, 1, 'NXS', 'NXS_BTC', 'BTC', '0.00032173', 1527933002);
INSERT INTO `counter_currencys` VALUES (58, 4, 1, 'XCP', 'XCP_BTC', 'BTC', '0.00161638', 1527933002);
INSERT INTO `counter_currencys` VALUES (59, 4, 1, 'BITB', 'BITB_BTC', 'BTC', '8.9E-7', 1527933002);
INSERT INTO `counter_currencys` VALUES (60, 4, 1, 'GEO', 'GEO_BTC', 'BTC', '0.00019172', 1527933002);
INSERT INTO `counter_currencys` VALUES (61, 4, 1, 'FLDC', 'FLDC_BTC', 'BTC', '1.59E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (62, 4, 1, 'GRC', 'GRC_BTC', 'BTC', '4.92E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (63, 4, 1, 'FLO', 'FLO_BTC', 'BTC', '1.2E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (64, 4, 1, 'NBT', 'NBT_BTC', 'BTC', '5.085E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (65, 4, 1, 'MUE', 'MUE_BTC', 'BTC', '1.352E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (66, 4, 1, 'XEM', 'XEM_BTC', 'BTC', '3.408E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (67, 4, 1, 'CLAM', 'CLAM_BTC', 'BTC', '0.00040599', 1527933002);
INSERT INTO `counter_currencys` VALUES (68, 4, 1, 'DMD', 'DMD_BTC', 'BTC', '0.00068734', 1527933002);
INSERT INTO `counter_currencys` VALUES (69, 4, 1, 'GAM', 'GAM_BTC', 'BTC', '0.00087001', 1527933002);
INSERT INTO `counter_currencys` VALUES (70, 4, 1, 'SPHR', 'SPHR_BTC', 'BTC', '0.00027862', 1527933002);
INSERT INTO `counter_currencys` VALUES (71, 4, 1, 'OK', 'OK_BTC', 'BTC', '1.525E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (72, 4, 1, 'SNRG', 'SNRG_BTC', 'BTC', '', 1527933002);
INSERT INTO `counter_currencys` VALUES (73, 4, 1, 'AEON', 'AEON_BTC', 'BTC', '0.0002161', 1527933002);
INSERT INTO `counter_currencys` VALUES (74, 4, 1, 'ETH', 'ETH_BTC', 'BTC', '0.077852', 1527933002);
INSERT INTO `counter_currencys` VALUES (75, 4, 1, 'TX', 'TX_BTC', 'BTC', '0.00011647', 1527933002);
INSERT INTO `counter_currencys` VALUES (76, 4, 1, 'BCY', 'BCY_BTC', 'BTC', '3.28E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (77, 4, 1, 'EXP', 'EXP_BTC', 'BTC', '0.00019179', 1527933002);
INSERT INTO `counter_currencys` VALUES (78, 4, 1, 'OMNI', 'OMNI_BTC', 'BTC', '0.00329896', 1527933002);
INSERT INTO `counter_currencys` VALUES (79, 4, 1, 'AMP', 'AMP_BTC', 'BTC', '2.347E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (80, 4, 1, 'XLM', 'XLM_BTC', 'BTC', '3.928E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (81, 4, 1, 'BTC', 'BTC_USDT', 'USDT', '7661.84812792', 1527933002);
INSERT INTO `counter_currencys` VALUES (82, 4, 1, 'RVR', 'RVR_BTC', 'BTC', '8.47E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (83, 4, 1, 'EMC', 'EMC_BTC', 'BTC', '0.00030082', 1527933002);
INSERT INTO `counter_currencys` VALUES (84, 4, 1, 'FCT', 'FCT_BTC', 'BTC', '0.00205865', 1527933002);
INSERT INTO `counter_currencys` VALUES (85, 4, 1, 'EGC', 'EGC_BTC', 'BTC', '2.153E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (86, 4, 1, 'SLS', 'SLS_BTC', 'BTC', '0.00529115', 1527933002);
INSERT INTO `counter_currencys` VALUES (87, 4, 1, 'RADS', 'RADS_BTC', 'BTC', '0.00050846', 1527933002);
INSERT INTO `counter_currencys` VALUES (88, 4, 1, 'DCR', 'DCR_BTC', 'BTC', '0.01324984', 1527933002);
INSERT INTO `counter_currencys` VALUES (89, 4, 1, 'BSD', 'BSD_BTC', 'BTC', '6.878E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (90, 4, 1, 'XVG', 'XVG_BTC', 'BTC', '5.22E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (91, 4, 1, 'PIVX', 'PIVX_BTC', 'BTC', '0.00051406', 1527933002);
INSERT INTO `counter_currencys` VALUES (92, 4, 1, 'MEME', 'MEME_BTC', 'BTC', '2.046E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (93, 4, 1, 'STEEM', 'STEEM_BTC', 'BTC', '0.00032205', 1527933002);
INSERT INTO `counter_currencys` VALUES (94, 4, 1, '2GIVE', '2GIVE_BTC', 'BTC', '1.01E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (95, 4, 1, 'LSK', 'LSK_BTC', 'BTC', '0.00121', 1527933002);
INSERT INTO `counter_currencys` VALUES (96, 4, 1, 'BRK', 'BRK_BTC', 'BTC', '1.943E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (97, 4, 1, 'WAVES', 'WAVES_BTC', 'BTC', '0.00055442', 1527933002);
INSERT INTO `counter_currencys` VALUES (98, 4, 1, 'LBC', 'LBC_BTC', 'BTC', '2.535E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (99, 4, 1, 'SBD', 'SBD_BTC', 'BTC', '0.00023122', 1527933002);
INSERT INTO `counter_currencys` VALUES (100, 4, 1, 'BRX', 'BRX_BTC', 'BTC', '9.704E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (101, 4, 1, 'ETC', 'ETC_BTC', 'BTC', '0.00208813', 1527933002);
INSERT INTO `counter_currencys` VALUES (102, 4, 1, 'ETC', 'ETC_ETH', 'ETH', '0.02682591', 1527933002);
INSERT INTO `counter_currencys` VALUES (103, 4, 1, 'STRAT', 'STRAT_BTC', 'BTC', '0.0005903', 1527933002);
INSERT INTO `counter_currencys` VALUES (104, 4, 1, 'UNB', 'UNB_BTC', 'BTC', '6.939E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (105, 4, 1, 'SYNX', 'SYNX_BTC', 'BTC', '3.811E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (106, 4, 1, 'EBST', 'EBST_BTC', 'BTC', '2.493E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (107, 4, 1, 'VRM', 'VRM_BTC', 'BTC', '0.00024736', 1527933002);
INSERT INTO `counter_currencys` VALUES (108, 4, 1, 'SEQ', 'SEQ_BTC', 'BTC', '1.531E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (109, 4, 1, 'REP', 'REP_BTC', 'BTC', '0.00517813', 1527933002);
INSERT INTO `counter_currencys` VALUES (110, 4, 1, 'SHIFT', 'SHIFT_BTC', 'BTC', '0.000253', 1527933002);
INSERT INTO `counter_currencys` VALUES (111, 4, 1, 'ARDR', 'ARDR_BTC', 'BTC', '3.339E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (112, 4, 1, 'XZC', 'XZC_BTC', 'BTC', '0.00386032', 1527933002);
INSERT INTO `counter_currencys` VALUES (113, 4, 1, 'NEO', 'NEO_BTC', 'BTC', '0.00747997', 1527933002);
INSERT INTO `counter_currencys` VALUES (114, 4, 1, 'ZEC', 'ZEC_BTC', 'BTC', '0.03309939', 1527933002);
INSERT INTO `counter_currencys` VALUES (115, 4, 1, 'ZCL', 'ZCL_BTC', 'BTC', '0.00178398', 1527933002);
INSERT INTO `counter_currencys` VALUES (116, 4, 1, 'IOP', 'IOP_BTC', 'BTC', '0.0001776', 1527933002);
INSERT INTO `counter_currencys` VALUES (117, 4, 1, 'GOLOS', 'GOLOS_BTC', 'BTC', '8.14E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (118, 4, 1, 'UBQ', 'UBQ_BTC', 'BTC', '0.00020069', 1527933002);
INSERT INTO `counter_currencys` VALUES (119, 4, 1, 'KMD', 'KMD_BTC', 'BTC', '0.00034047', 1527933002);
INSERT INTO `counter_currencys` VALUES (120, 4, 1, 'GBG', 'GBG_BTC', 'BTC', '7.35E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (121, 4, 1, 'SIB', 'SIB_BTC', 'BTC', '9.188E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (122, 4, 1, 'ION', 'ION_BTC', 'BTC', '0.00018248', 1527933002);
INSERT INTO `counter_currencys` VALUES (123, 4, 1, 'LMC', 'LMC_BTC', 'BTC', '5.87E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (124, 4, 1, 'QWARK', 'QWARK_BTC', 'BTC', '9.59E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (125, 4, 1, 'CRW', 'CRW_BTC', 'BTC', '0.00011588', 1527933002);
INSERT INTO `counter_currencys` VALUES (126, 4, 1, 'SWT', 'SWT_BTC', 'BTC', '0.00013523', 1527933002);
INSERT INTO `counter_currencys` VALUES (127, 4, 1, 'MLN', 'MLN_BTC', 'BTC', '0.00528203', 1527933002);
INSERT INTO `counter_currencys` VALUES (128, 4, 1, 'ARK', 'ARK_BTC', 'BTC', '0.00033253', 1527933002);
INSERT INTO `counter_currencys` VALUES (129, 4, 1, 'DYN', 'DYN_BTC', 'BTC', '0.00020167', 1527933002);
INSERT INTO `counter_currencys` VALUES (130, 4, 1, 'TKS', 'TKS_BTC', 'BTC', '0.0001718', 1527933002);
INSERT INTO `counter_currencys` VALUES (131, 4, 1, 'MUSIC', 'MUSIC_BTC', 'BTC', '1.43E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (132, 4, 1, 'DTB', 'DTB_BTC', 'BTC', '6.0E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (133, 4, 1, 'INCNT', 'INCNT_BTC', 'BTC', '4.498E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (134, 4, 1, 'GBYTE', 'GBYTE_BTC', 'BTC', '0.02305103', 1527933002);
INSERT INTO `counter_currencys` VALUES (135, 4, 1, 'GNT', 'GNT_BTC', 'BTC', '7.961E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (136, 4, 1, 'NXC', 'NXC_BTC', 'BTC', '1.69E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (137, 4, 1, 'EDG', 'EDG_BTC', 'BTC', '7.119E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (138, 4, 1, 'LGD', 'LGD_BTC', 'BTC', '5.373E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (139, 4, 1, 'TRST', 'TRST_BTC', 'BTC', '9.56E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (140, 4, 1, 'GNT', 'GNT_ETH', 'ETH', '0.00102574', 1527933002);
INSERT INTO `counter_currencys` VALUES (141, 4, 1, 'REP', 'REP_ETH', 'ETH', '0.06674669', 1527933002);
INSERT INTO `counter_currencys` VALUES (142, 4, 1, 'ETH', 'ETH_USDT', 'USDT', '594.5', 1527933002);
INSERT INTO `counter_currencys` VALUES (143, 4, 1, 'WINGS', 'WINGS_ETH', 'ETH', '0.00071301', 1527933002);
INSERT INTO `counter_currencys` VALUES (144, 4, 1, 'WINGS', 'WINGS_BTC', 'BTC', '5.46E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (145, 4, 1, 'RLC', 'RLC_BTC', 'BTC', '0.00022276', 1527933002);
INSERT INTO `counter_currencys` VALUES (146, 4, 1, 'GNO', 'GNO_BTC', 'BTC', '0.00958569', 1527933002);
INSERT INTO `counter_currencys` VALUES (147, 4, 1, 'GUP', 'GUP_BTC', 'BTC', '2.915E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (148, 4, 1, 'LUN', 'LUN_BTC', 'BTC', '0.00162541', 1527933002);
INSERT INTO `counter_currencys` VALUES (149, 4, 1, 'GUP', 'GUP_ETH', 'ETH', '0.000382', 1527933002);
INSERT INTO `counter_currencys` VALUES (150, 4, 1, 'RLC', 'RLC_ETH', 'ETH', '0.00286831', 1527933002);
INSERT INTO `counter_currencys` VALUES (151, 4, 1, 'LUN', 'LUN_ETH', 'ETH', '0.0209275', 1527933002);
INSERT INTO `counter_currencys` VALUES (152, 4, 1, 'GNO', 'GNO_ETH', 'ETH', '0.1248688', 1527933002);
INSERT INTO `counter_currencys` VALUES (153, 4, 1, 'HMQ', 'HMQ_BTC', 'BTC', '1.755E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (154, 4, 1, 'HMQ', 'HMQ_ETH', 'ETH', '0.00022884', 1527933002);
INSERT INTO `counter_currencys` VALUES (155, 4, 1, 'ANT', 'ANT_BTC', 'BTC', '0.00040865', 1527933002);
INSERT INTO `counter_currencys` VALUES (156, 4, 1, 'TRST', 'TRST_ETH', 'ETH', '0.00012513', 1527933002);
INSERT INTO `counter_currencys` VALUES (157, 4, 1, 'ANT', 'ANT_ETH', 'ETH', '0.00522122', 1527933002);
INSERT INTO `counter_currencys` VALUES (158, 4, 1, 'SC', 'SC_BTC', 'BTC', '2.03E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (159, 4, 1, 'BAT', 'BAT_ETH', 'ETH', '0.00050308', 1527933002);
INSERT INTO `counter_currencys` VALUES (160, 4, 1, 'BAT', 'BAT_BTC', 'BTC', '3.897E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (161, 4, 1, 'ZEN', 'ZEN_BTC', 'BTC', '0.0039891', 1527933002);
INSERT INTO `counter_currencys` VALUES (162, 4, 1, 'QRL', 'QRL_BTC', 'BTC', '0.00010397', 1527933002);
INSERT INTO `counter_currencys` VALUES (163, 4, 1, 'QRL', 'QRL_ETH', 'ETH', '0.00134388', 1527933002);
INSERT INTO `counter_currencys` VALUES (164, 4, 1, 'CRB', 'CRB_BTC', 'BTC', '2.004E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (165, 4, 1, 'CRB', 'CRB_ETH', 'ETH', '0.000264', 1527933002);
INSERT INTO `counter_currencys` VALUES (166, 4, 1, 'LGD', 'LGD_ETH', 'ETH', '0.0007026', 1527933002);
INSERT INTO `counter_currencys` VALUES (167, 4, 1, 'PTOY', 'PTOY_BTC', 'BTC', '1.669E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (168, 4, 1, 'PTOY', 'PTOY_ETH', 'ETH', '0.00021471', 1527933002);
INSERT INTO `counter_currencys` VALUES (169, 4, 1, 'CFI', 'CFI_BTC', 'BTC', '7.95E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (170, 4, 1, 'CFI', 'CFI_ETH', 'ETH', '0.00010304', 1527933002);
INSERT INTO `counter_currencys` VALUES (171, 4, 1, 'BNT', 'BNT_BTC', 'BTC', '0.000542', 1527933002);
INSERT INTO `counter_currencys` VALUES (172, 4, 1, 'BNT', 'BNT_ETH', 'ETH', '0.00700549', 1527933002);
INSERT INTO `counter_currencys` VALUES (173, 4, 1, 'NMR', 'NMR_BTC', 'BTC', '0.00133419', 1527933002);
INSERT INTO `counter_currencys` VALUES (174, 4, 1, 'NMR', 'NMR_ETH', 'ETH', '0.01728172', 1527933002);
INSERT INTO `counter_currencys` VALUES (175, 4, 1, 'LTC', 'LTC_ETH', 'ETH', '0.2075', 1527933002);
INSERT INTO `counter_currencys` VALUES (176, 4, 1, 'XRP', 'XRP_ETH', 'ETH', '0.00108497', 1527933002);
INSERT INTO `counter_currencys` VALUES (177, 4, 1, 'SNT', 'SNT_BTC', 'BTC', '1.374E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (178, 4, 1, 'SNT', 'SNT_ETH', 'ETH', '0.00017318', 1527933002);
INSERT INTO `counter_currencys` VALUES (179, 4, 1, 'DCT', 'DCT_BTC', 'BTC', '7.006E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (180, 4, 1, 'XEL', 'XEL_BTC', 'BTC', '3.423E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (181, 4, 1, 'MCO', 'MCO_BTC', 'BTC', '0.00088389', 1527933002);
INSERT INTO `counter_currencys` VALUES (182, 4, 1, 'MCO', 'MCO_ETH', 'ETH', '0.01161174', 1527933002);
INSERT INTO `counter_currencys` VALUES (183, 4, 1, 'ADT', 'ADT_BTC', 'BTC', '4.04E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (184, 4, 1, 'ADT', 'ADT_ETH', 'ETH', '5.165E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (185, 4, 1, 'PAY', 'PAY_BTC', 'BTC', '0.00012353', 1527933002);
INSERT INTO `counter_currencys` VALUES (186, 4, 1, 'PAY', 'PAY_ETH', 'ETH', '0.00159781', 1527933002);
INSERT INTO `counter_currencys` VALUES (187, 4, 1, 'STORJ', 'STORJ_BTC', 'BTC', '0.00010847', 1527933002);
INSERT INTO `counter_currencys` VALUES (188, 4, 1, 'STORJ', 'STORJ_ETH', 'ETH', '0.00137625', 1527933002);
INSERT INTO `counter_currencys` VALUES (189, 4, 1, 'ADX', 'ADX_BTC', 'BTC', '8.361E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (190, 4, 1, 'ADX', 'ADX_ETH', 'ETH', '0.00107945', 1527933002);
INSERT INTO `counter_currencys` VALUES (191, 4, 1, 'DASH', 'DASH_ETH', 'ETH', '0.54254969', 1527933002);
INSERT INTO `counter_currencys` VALUES (192, 4, 1, 'SC', 'SC_ETH', 'ETH', '2.63E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (193, 4, 1, 'ZEC', 'ZEC_ETH', 'ETH', '0.42399078', 1527933002);
INSERT INTO `counter_currencys` VALUES (194, 4, 1, 'ZEC', 'ZEC_USDT', 'USDT', '254.1671885', 1527933002);
INSERT INTO `counter_currencys` VALUES (195, 4, 1, 'LTC', 'LTC_USDT', 'USDT', '123.31386439', 1527933002);
INSERT INTO `counter_currencys` VALUES (196, 4, 1, 'ETC', 'ETC_USDT', 'USDT', '15.9', 1527933002);
INSERT INTO `counter_currencys` VALUES (197, 4, 1, 'XRP', 'XRP_USDT', 'USDT', '0.6448', 1527933002);
INSERT INTO `counter_currencys` VALUES (198, 4, 1, 'OMG', 'OMG_BTC', 'BTC', '0.00149199', 1527933002);
INSERT INTO `counter_currencys` VALUES (199, 4, 1, 'OMG', 'OMG_ETH', 'ETH', '0.01918599', 1527933002);
INSERT INTO `counter_currencys` VALUES (200, 4, 1, 'CVC', 'CVC_BTC', 'BTC', '4.202E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (201, 4, 1, 'CVC', 'CVC_ETH', 'ETH', '0.00054279', 1527933002);
INSERT INTO `counter_currencys` VALUES (202, 4, 1, 'PART', 'PART_BTC', 'BTC', '0.00109642', 1527933002);
INSERT INTO `counter_currencys` VALUES (203, 4, 1, 'QTUM', 'QTUM_BTC', 'BTC', '0.00189383', 1527933002);
INSERT INTO `counter_currencys` VALUES (204, 4, 1, 'QTUM', 'QTUM_ETH', 'ETH', '0.02468061', 1527933002);
INSERT INTO `counter_currencys` VALUES (205, 4, 1, 'XMR', 'XMR_ETH', 'ETH', '0.275639', 1527933002);
INSERT INTO `counter_currencys` VALUES (206, 4, 1, 'XEM', 'XEM_ETH', 'ETH', '0.00044188', 1527933002);
INSERT INTO `counter_currencys` VALUES (207, 4, 1, 'XLM', 'XLM_ETH', 'ETH', '0.000504', 1527933002);
INSERT INTO `counter_currencys` VALUES (208, 4, 1, 'NEO', 'NEO_ETH', 'ETH', '0.09566561', 1527933002);
INSERT INTO `counter_currencys` VALUES (209, 4, 1, 'XMR', 'XMR_USDT', 'USDT', '163.92166419', 1527933002);
INSERT INTO `counter_currencys` VALUES (210, 4, 1, 'DASH', 'DASH_USDT', 'USDT', '323.84429479', 1527933002);
INSERT INTO `counter_currencys` VALUES (211, 4, 1, 'BCC', 'BCC_ETH', 'ETH', '1.73685028', 1527933002);
INSERT INTO `counter_currencys` VALUES (212, 4, 1, 'BCC', 'BCC_USDT', 'USDT', '1034.63499984', 1527933002);
INSERT INTO `counter_currencys` VALUES (213, 4, 1, 'BCC', 'BCC_BTC', 'BTC', '0.13500007', 1527933002);
INSERT INTO `counter_currencys` VALUES (214, 4, 1, 'DNT', 'DNT_BTC', 'BTC', '8.24E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (215, 4, 1, 'DNT', 'DNT_ETH', 'ETH', '0.00010805', 1527933002);
INSERT INTO `counter_currencys` VALUES (216, 4, 1, 'NEO', 'NEO_USDT', 'USDT', '57.39', 1527933002);
INSERT INTO `counter_currencys` VALUES (217, 4, 1, 'WAVES', 'WAVES_ETH', 'ETH', '0.007067', 1527933002);
INSERT INTO `counter_currencys` VALUES (218, 4, 1, 'STRAT', 'STRAT_ETH', 'ETH', '0.00759', 1527933002);
INSERT INTO `counter_currencys` VALUES (219, 4, 1, 'DGB', 'DGB_ETH', 'ETH', '5.77E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (220, 4, 1, 'FCT', 'FCT_ETH', 'ETH', '0.02627001', 1527933002);
INSERT INTO `counter_currencys` VALUES (221, 4, 1, 'OMG', 'OMG_USDT', 'USDT', '11.39999999', 1527933002);
INSERT INTO `counter_currencys` VALUES (222, 4, 1, 'ADA', 'ADA_BTC', 'BTC', '2.945E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (223, 4, 1, 'MANA', 'MANA_BTC', 'BTC', '1.356E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (224, 4, 1, 'MANA', 'MANA_ETH', 'ETH', '0.00017348', 1527933002);
INSERT INTO `counter_currencys` VALUES (225, 4, 1, 'SALT', 'SALT_BTC', 'BTC', '0.00026924', 1527933002);
INSERT INTO `counter_currencys` VALUES (226, 4, 1, 'SALT', 'SALT_ETH', 'ETH', '0.00347', 1527933002);
INSERT INTO `counter_currencys` VALUES (227, 4, 1, 'TIX', 'TIX_BTC', 'BTC', '4.862E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (228, 4, 1, 'TIX', 'TIX_ETH', 'ETH', '0.00062885', 1527933002);
INSERT INTO `counter_currencys` VALUES (229, 4, 1, 'RCN', 'RCN_BTC', 'BTC', '1.209E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (230, 4, 1, 'RCN', 'RCN_ETH', 'ETH', '0.00015415', 1527933002);
INSERT INTO `counter_currencys` VALUES (231, 4, 1, 'VIB', 'VIB_BTC', 'BTC', '1.756E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (232, 4, 1, 'VIB', 'VIB_ETH', 'ETH', '0.00022922', 1527933002);
INSERT INTO `counter_currencys` VALUES (233, 4, 1, 'MER', 'MER_BTC', 'BTC', '2.294E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (234, 4, 1, 'POWR', 'POWR_BTC', 'BTC', '4.402E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (235, 4, 1, 'POWR', 'POWR_ETH', 'ETH', '0.000564', 1527933002);
INSERT INTO `counter_currencys` VALUES (236, 4, 1, 'BTG', 'BTG_BTC', 'BTC', '0.00593868', 1527933002);
INSERT INTO `counter_currencys` VALUES (237, 4, 1, 'BTG', 'BTG_ETH', 'ETH', '0.07533651', 1527933002);
INSERT INTO `counter_currencys` VALUES (238, 4, 1, 'BTG', 'BTG_USDT', 'USDT', '45.2', 1527933002);
INSERT INTO `counter_currencys` VALUES (239, 4, 1, 'ADA', 'ADA_ETH', 'ETH', '0.0003785', 1527933002);
INSERT INTO `counter_currencys` VALUES (240, 4, 1, 'ENG', 'ENG_BTC', 'BTC', '0.00026538', 1527933002);
INSERT INTO `counter_currencys` VALUES (241, 4, 1, 'ENG', 'ENG_ETH', 'ETH', '0.00339942', 1527933002);
INSERT INTO `counter_currencys` VALUES (242, 4, 1, 'ADA', 'ADA_USDT', 'USDT', '0.22529484', 1527933002);
INSERT INTO `counter_currencys` VALUES (243, 4, 1, 'XVG', 'XVG_USDT', 'USDT', '0.04012036', 1527933002);
INSERT INTO `counter_currencys` VALUES (244, 4, 1, 'NXT', 'NXT_USDT', 'USDT', '0.13879138', 1527933002);
INSERT INTO `counter_currencys` VALUES (245, 4, 1, 'UKG', 'UKG_BTC', 'BTC', '1.962E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (246, 4, 1, 'UKG', 'UKG_ETH', 'ETH', '0.00026977', 1527933002);
INSERT INTO `counter_currencys` VALUES (247, 4, 1, 'IGNIS', 'IGNIS_BTC', 'BTC', '1.195E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (248, 4, 1, 'SRN', 'SRN_BTC', 'BTC', '3.919E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (249, 4, 1, 'SRN', 'SRN_ETH', 'ETH', '0.00050439', 1527933002);
INSERT INTO `counter_currencys` VALUES (250, 4, 1, 'WAX', 'WAX_BTC', 'BTC', '2.67E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (251, 4, 1, 'WAX', 'WAX_ETH', 'ETH', '0.00035228', 1527933002);
INSERT INTO `counter_currencys` VALUES (252, 4, 1, 'ZRX', 'ZRX_BTC', 'BTC', '0.0001698', 1527933002);
INSERT INTO `counter_currencys` VALUES (253, 4, 1, 'ZRX', 'ZRX_ETH', 'ETH', '0.00218914', 1527933002);
INSERT INTO `counter_currencys` VALUES (254, 4, 1, 'VEE', 'VEE_BTC', 'BTC', '4.45E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (255, 4, 1, 'VEE', 'VEE_ETH', 'ETH', '5.76E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (256, 4, 1, 'BCPT', 'BCPT_BTC', 'BTC', '4.283E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (257, 4, 1, 'BCPT', 'BCPT_ETH', 'ETH', '0.00054633', 1527933002);
INSERT INTO `counter_currencys` VALUES (258, 4, 1, 'TRX', 'TRX_BTC', 'BTC', '7.92E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (259, 4, 1, 'TRX', 'TRX_ETH', 'ETH', '0.00010142', 1527933002);
INSERT INTO `counter_currencys` VALUES (260, 4, 1, 'TUSD', 'TUSD_BTC', 'BTC', '0.0001307', 1527933002);
INSERT INTO `counter_currencys` VALUES (261, 4, 1, 'LRC', 'LRC_BTC', 'BTC', '6.941E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (262, 4, 1, 'LRC', 'LRC_ETH', 'ETH', '0.00089184', 1527933002);
INSERT INTO `counter_currencys` VALUES (263, 4, 1, 'TUSD', 'TUSD_ETH', 'ETH', '0.00169882', 1527933002);
INSERT INTO `counter_currencys` VALUES (264, 4, 1, 'UP', 'UP_BTC', 'BTC', '1.449E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (265, 4, 1, 'UP', 'UP_ETH', 'ETH', '0.00018949', 1527933002);
INSERT INTO `counter_currencys` VALUES (266, 4, 1, 'DMT', 'DMT_BTC', 'BTC', '4.98E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (267, 4, 1, 'DMT', 'DMT_ETH', 'ETH', '0.00064149', 1527933002);
INSERT INTO `counter_currencys` VALUES (268, 4, 1, 'TUSD', 'TUSD_USDT', 'USDT', '1.004', 1527933002);
INSERT INTO `counter_currencys` VALUES (269, 4, 1, 'POLY', 'POLY_BTC', 'BTC', '9.417E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (270, 4, 1, 'POLY', 'POLY_ETH', 'ETH', '0.00121249', 1527933002);
INSERT INTO `counter_currencys` VALUES (271, 4, 1, 'PRO', 'PRO_BTC', 'BTC', '0.00014593', 1527933002);
INSERT INTO `counter_currencys` VALUES (272, 4, 1, 'PRO', 'PRO_ETH', 'ETH', '0.00186514', 1527933002);
INSERT INTO `counter_currencys` VALUES (273, 4, 1, 'SC', 'SC_USDT', 'USDT', '0.01532211', 1527933002);
INSERT INTO `counter_currencys` VALUES (274, 4, 1, 'TRX', 'TRX_USDT', 'USDT', '0.06064904', 1527933002);
INSERT INTO `counter_currencys` VALUES (275, 4, 1, 'BLT', 'BLT_BTC', 'BTC', '5.818E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (276, 4, 1, 'BLT', 'BLT_ETH', 'ETH', '0.00075446', 1527933002);
INSERT INTO `counter_currencys` VALUES (277, 4, 1, 'STORM', 'STORM_BTC', 'BTC', '4.4E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (278, 4, 1, 'STORM', 'STORM_ETH', 'ETH', '5.66E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (279, 4, 1, 'AID', 'AID_BTC', 'BTC', '2.32E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (280, 4, 1, 'AID', 'AID_ETH', 'ETH', '0.00029449', 1527933002);
INSERT INTO `counter_currencys` VALUES (281, 4, 1, 'NGC', 'NGC_BTC', 'BTC', '7.261E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (282, 4, 1, 'NGC', 'NGC_ETH', 'ETH', '0.00094189', 1527933002);
INSERT INTO `counter_currencys` VALUES (283, 4, 1, 'GTO', 'GTO_BTC', 'BTC', '3.186E-5', 1527933002);
INSERT INTO `counter_currencys` VALUES (284, 4, 1, 'GTO', 'GTO_ETH', 'ETH', '0.00042058', 1527933002);
INSERT INTO `counter_currencys` VALUES (285, 4, 1, 'DCR', 'DCR_USDT', 'USDT', '101.18397757', 1527933002);
INSERT INTO `counter_currencys` VALUES (286, 4, 1, 'OCN', 'OCN_BTC', 'BTC', '2.47E-6', 1527933002);
INSERT INTO `counter_currencys` VALUES (287, 4, 1, 'OCN', 'OCN_ETH', 'ETH', '3.25E-5', 1527933002);

-- ----------------------------
-- Table structure for platforms
-- ----------------------------
DROP TABLE IF EXISTS `platforms`;
CREATE TABLE `platforms`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `create_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sort_table
-- ----------------------------
DROP TABLE IF EXISTS `sort_table`;
CREATE TABLE `sort_table`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NULL DEFAULT NULL,
  `bi_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `huobi_price` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gateio_price` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `binance_price` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bittrex_price` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `clome4_price` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `clome5_price` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pair` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `percentage` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `percentage_pri` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `create_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `create_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `time_stamp` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES (1, '2018-06-02 17:50:02', 1527933002);

SET FOREIGN_KEY_CHECKS = 1;
