#gift
SELECT gift, exchange_points, gift_description, gift_photo FROM runningkids.gift
where gift_no = 1;

#record
SELECT sum(distance), c.sch_no FROM runningkids.record as a left join members as b on a.m_id = b.m_id left join school as c on b.sch_no = c.sch_no group by c.sch_no;

#header
select a.m_id, sum(b.score), sum(c.coin) from runningkids.members as a 
left join score as b on a.m_id = b.m_id 
left join coin as c on a.m_id = c.m_id group by a.m_id;

#knowledge
SELECT a.city , b.content, c.content , c.items FROM runningkids.city as a
left join knowledge as b on a.city_no = b.city_no
left join question as c on a.city_no = c.city
order by a.city_no;
