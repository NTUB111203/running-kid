insert into runningkids.members(m_name, identity, gender, phone, mail, password, s_no, class) value('emily','S','F','0978249298','emily.sep24@','ABCD','1','101');
insert into runningkids.school(s_name, address) value('私立復興實驗高級中學附設小學部','臺北市大安區仁愛里敦化南路1段262號');
insert into runningkids.student_class(m_id, grade1) value('1','101');
insert into runningkids.record(m_id, r_datetime, distance,c_no) value('109-1','2011.09.05 00:00:00','10.1',1);
insert into runningkids.category(c_name) value('團體跑');
insert into runningkids.coin(m_id, datetime,c_no) value('1','2022.03.05 00:00:00','3');
insert into runningkids.group (starttime, mem1, mem2) value('2022.03.15 00:00:00','1','2');
insert into runningkids.knowledge(city, content, difficulty) value('台北市','據《臺灣島之歷史與地誌》，景美源自梘尾，指瑠公圳大木梘之尾，其址約在今日舊景美橋附近，後取臺語同音，改稱「景尾」。1895年〈臺北附近地形圖〉曾將景尾街誤植為景美街，1898年〈臺灣堡圖〉又改回景尾街，是最早出現景美的正式紀錄。1950年台灣推行地方自治，景尾自臺北縣深坑鄉（現新北市深坑區）劃出獨立設鎮，地方士紳林佛國建議，改用較文雅的景美，成為景美鎮。「景美」名稱沿用至今，但臺灣話仍讀作「景尾」（白話字：Kéng-bé），如臺北捷運景美站之到站廣播。','L1');
insert into runningkids.question(content,items,answer,difficulty) value('請問台北市有幾個行政區?', 'A.12 B.14 C.16 D.20', '1', 'L1');
insert into runningkids.answer(a_no, answer_content) value('1', 'A.12');

