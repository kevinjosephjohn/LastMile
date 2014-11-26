from gcm import *

gcm = GCM("AIzaSyD6qy0v37hnfV300SLcnnzA9oryImoF2E4")
data = {'the_message': 'You have x new friends', 'param2': 'value2'}

reg_id = 'APA91bHEdt5tzkIlRU_ZabwrFknAjJTqemWlAbTo8YNt3rko5Nz-_FsK7Rw5Q-sE30s79H2-u1MFylydoE5R379ltKhWIC9nyD5Agzc6Ppxfyqr7PGj39QmT7RxL9q5WMgyzecAsbDhhtnsPjedQUxI_A_SLG797tg'

gcm.plaintext_request(registration_id=reg_id, data=data)